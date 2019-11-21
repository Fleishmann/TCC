<?php


function Mask($mask, $str)
{

  $str = str_replace(" ", "", $str);

  for ($i = 0; $i < strlen($str); $i++) {
    $mask[strpos($mask, "#")] = $str[$i];
  }

  return $mask;
}

require_once('../db.class.php');

$cnpj          = $_POST['CNPJ'];
$razaoSocial   = $_POST['RazaoSocial'];
$Endereco      = $_POST['Endereco'];
$cep           = $_POST['CEP'];
$cidade        = $_POST['Cidade'];
$estado        = $_POST['Estado'];
$email         = $_POST['Email'];
$fone          = $_POST['Fone'];
$senha         = $_POST['Senha'];
$confirmaSenha = $_POST['confSenha'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$cnpj_existe  = false;
$razao_existe = false;
$email_existe = false;

// echo Mask("##.###.###/####-##",$cnpj).'<BR>';

//Verificar se o cnpj já existe
$sql = " select * from empresas where cnpj = '$cnpj' ";
if ($resultado_id = mysqli_query($link, $sql)) {

  $dados_usuario = mysqli_fetch_array($resultado_id);

  if (isset($dados_usuario['cnpj'])) {
    $cnpj_existe = true;
  }
} else {
  echo 'Erro ao tentar localizar o registro do usuário';
}

//Verificar se a Razao Social já existe
$sql = " select * from empresas where razaoSocial = '$razaoSocial' ";
if ($resultado_id = mysqli_query($link, $sql)) {

  $dados_usuario = mysqli_fetch_array($resultado_id);

  if (isset($dados_usuario['razaoSocial'])) {
    $razao_existe = true;
  }
} else {
  echo 'Erro ao tentar localizar o registro do usuário';
}

//verificar se o email ja existe
$sql = " select * from empresas where email = '$email' ";
if ($resultado_id = mysqli_query($link, $sql)) {

  $dados_usuario = mysqli_fetch_array($resultado_id);

  if (isset($dados_usuario['email'])) {
    $email_existe = true;
  }
} else {
  echo 'Erro ao tentar localizar o registro do email';
}

if ($usuario_existe || $email_existe) {

  $retorno_get = '';

  if ($usuario_existe) {
    $retorno_get .= "erro_usuario=1&";
  }

  if ($email_existe) {
    $retorno_get .= "erro_email=1&";
  }

  header('Location: page-cadastro.php?' . $retorno_get);
  die();
}

$sql = " insert into empresas(razaoSocial,
                                endereco,
                                cep,
                                cidade,
                                estado,
                                email,
                                telefone,
                                senha,
                                conSenha,
                                cnpj,
                                apelido) 
                        values ('$razaoSocial',
                                '$Endereco',
                                 $cep,
                                '$cidade',
                                '$estado',
                                '$email',
                                '$fone',
                                '$senha',
                                '$confirmaSenha',
                                '$cnpj',
                                '$email'); ";
//executar a query
if (mysqli_query($link, $sql)) {
  header('Location: page-login.php?cadastrado=1');
} else {
  echo 'Erro ao registrar o usuário';
}
