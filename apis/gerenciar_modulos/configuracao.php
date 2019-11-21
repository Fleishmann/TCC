<?php
session_start();

require_once('../db.class.php');

$apelido  = $_POST['alias'];
$email    = $_POST['email'];
$senha    = $_POST['senha'];
$razao    = $_POST['razao'];
$cep      = $_POST['cep'];
$endereco = $_POST['endereco'];
$cidade   = $_POST['cidade'];
$estado   = $_POST['estado'];
$telefone = $_POST['telefone'];
$cnpj     = $_POST['cnpj'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " UPDATE empresas
            SET apelido = '$apelido', email = '$email', senha = '$senha', razaoSocial = '$razao', cep = '$cep', endereco = '$endereco', cidade = '$cidade', estado = '$estado', telefone = '$telefone', cnpj = '$cnpj'
          WHERE id = " . $_SESSION['id'];

//   //executar a query
if (mysqli_query($link, $sql)) {
    header('Location:  page-configuracao.php?alterado=1');
} else {
    echo 'Erro ao registrar o produto';
}
