<?php
session_start();

require_once('../../db.class.php');

$codprod = $_GET['codprod'];
$codprod = base64_decode($codprod);

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = "DELETE 
          FROM produtos 
         WHERE codprod = '$codprod' AND idEmpresa = " . $_SESSION['id'];

//executar a query
if (mysqli_query($link, $sql)) {
  header('Location:  page-prod-excluir.php?excluido=1');
} else {
  echo 'Erro ao registrar o produto';
}
