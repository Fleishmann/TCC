<?php 
  session_start();
  
  require_once('../../db.class.php');

  $codprod    = $_POST['codprod']; 
  $nome       = $_POST['nome'];
  $marca      = $_POST['marca'];
  $modelo     = $_POST['modelo'];
  $cor        = $_POST['cor'];
  $unidade    = $_POST['unidade'];
  $quantidade = $_POST['quantidade'];
  $preco      = $_POST['preco'];

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql = "INSERT INTO produtos(codprodControle, nomeProduto, idEmpresa, marca, modelo, cor, unidade, quantidade, preco) VALUES('$codprod', '$nome', ".$_SESSION["id"].", '$marca', '$modelo', '$cor', '$unidade', '$quantidade', '$preco')";

  //executar a query
  if(mysqli_query($link, $sql)){
    header('Location:  page-prod-adicionar.php?cadastrado=1');
  } else {
    echo 'Erro ao registrar o produto';
    echo $sql;    

  }

?>