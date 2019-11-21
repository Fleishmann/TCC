<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../../../index.php?erro=1');
}

require_once('../db.class.php');

$codprod = $_GET['codprod'];
$codprod = base64_decode($codprod);

$sql = "SELECT * FROM produtos WHERE codprod = $codprod AND idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle LIMIT 5";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

?>