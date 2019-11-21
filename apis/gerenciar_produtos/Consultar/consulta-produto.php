<?php

session_start();

require_once('../../db.class.php');

$id     = $_POST['id'];
$nome   = $_POST['nome'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$cor    = $_POST['cor'];

$sql = "SELECT * FROM produtos WHERE (nomeProduto LIKE '%$nome%' AND codprodControle LIKE '%$id%' AND marca LIKE '%$marca%' AND modelo LIKE '%$modelo%') and idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$qtd = mysqli_num_rows($resultado_id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>E-conomy Center - Gestor Empresarial</title>
  <link rel="icon" href="../../../imagens/logoSoMarca.png">

  <!-- Bootstrap -->
  <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../estilo.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-transparente">
    <div class="container">
      <!-- header -->
      <div class="navbar-header">
        <!-- botao toggle -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
          <span class="sr-only">alternar navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="..\..\gerenciar_modulos\page-menu.php" class="navbar-brand">
          <span class="img-logo"></span>
        </a>
      </div>
      <!-- navbar -->
      <div class="collapse navbar-collapse" id="barra-navegacao">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" id="exampleModal">Olá, <?= $_SESSION['usuario'] ?></a></li>
          <li class="divisor" role="separator"></li>
          <li><a href="../../../sair.php">Sair</a></li>
        </ul>
      </div>
    </div><!-- /container -->
  </nav><!-- /nav -->

  <!-- Conteudos -->
  <div class="capa">
    <section class="panel col-lg-12">
      <header class="panel-heading">
        <h2>Dados da busca:</h2>
      </header>

      <?php
      if ($qtd > 0) {
        ?>
        <table id="BuscaProdutos" class="table table-striped table-advanced table-hover">
          <tbody>
            <tr>
              <th><i class="icon_profile"></i> ID </th>
              <th><i class="icon_profile"></i> Nome </th>
              <th><i class="icon_profile"></i> Marca </th>
              <th><i class="icon_profile"></i> Modelo </th>
              <th><i class="icon_profile"></i> Cor </th>
              <th><i class="icon_profile"></i> Unidade </th>
              <th><i class="icon_profile"></i> Quantidade </th>
              <th><i class="icon_profile"></i> Preço </th>
            </tr>

            <?php
              while ($linha = mysqli_fetch_assoc($resultado_id)) {
                ?>
              <tr>
                <td><?= $linha['codprodControle']; ?></td>
                <td><?= $linha['nomeProduto']; ?></td>
                <td><?= $linha['marca']; ?></td>
                <td><?= $linha['modelo']; ?></td>
                <td><?= $linha['cor']; ?></td>
                <td><?= $linha['unidade']; ?></td>
                <td><?= $linha['quantidade']; ?></td>
                <td><?= $linha['preco']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <a href="../page-produtos.php" class="btn btn-primary btn-lg" style="margin-top: 50px;">☚ Voltar</a>
      <?php } else { ?>
        <h4>Não foi encontrado registro com essa palavra. </h4>
      <?php } ?>

    </section>
  </div>

  <!-- RODAPÉ -->
  <footer id="rodape">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <span class="img-logo-rodape"></span>
        </div>

        <div class="col-md-4">
          <h4>Gestor Empresarial - E-conomy Center</h4>
          <ul class="nav">
            <li><a href="#">Versão 0.1 Beta</a></li>
            <li><a href="#">Manual em construção</a></li>
          </ul>
        </div>

        <div class="col-md-3">
          <h4>Comunidades</h4>
          <ul class="nav">
            <li><a href="https://www.facebook.com/EconomyCenter">Facebook</a></li>
            <li><a href="#">erp.economycenter@gmail.com</a></li>
          </ul>
        </div>

        <div class="col-md-3">
          <ul class="nav">
            <li class="item-rede-social"><a href=""><img src="../../../imagens/facebook.png"></a></li>
            <li class="item-rede-social"><a href=""><img src="../../../imagens/instagram.png"></a></li>
            <li class="item-rede-social"><a href=""><img src="../../../imagens/twitter.png"></a></li>
          </ul>
        </div>
      </div><!-- /row -->
    </div>
  </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>