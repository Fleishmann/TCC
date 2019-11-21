<?php 
  session_start();
  
  require_once('../../db.class.php');

  $codprod         = $_POST['codprod']; 
  $codprodControle = $_POST['codprodControle']; 
  $nome            = $_POST['nome'];
  $marca           = $_POST['marca'];
  $modelo          = $_POST['modelo'];
  $cor             = $_POST['cor'];
  $unidade         = $_POST['unidade'];
  $quantidade      = $_POST['quantidade'];
  $preco           = $_POST['preco'];

  $objDb = new db();
  $link = $objDb->conecta_mysql();

  $sql = "UPDATE produtos 
             SET codprodControle = '$codprodControle', nomeProduto = '$nome', marca = '$marca', modelo = '$modelo', cor = '$cor', unidade = '$unidade', quantidade = '$quantidade', preco = '$preco'
           WHERE codprod = '$codprod' AND idEmpresa = " . $_SESSION['id'];

  //executar a query
  if(mysqli_query($link, $sql)){
    header('Location:  page-esto-editar.php?editado=1');
  } else {
    echo 'Erro ao registrar o produto';
  }
