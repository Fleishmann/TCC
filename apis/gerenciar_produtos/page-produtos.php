<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: ../../index.php?erro=1');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>E-conomy Center - Gestor Empresarial</title>
  <link rel="icon" href="../../imagens/logoSoMarca.png">

  <!-- Bootstrap -->
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../estilo.css" rel="stylesheet">
</head>

<body>
  <div class="img-back-produto">
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
          <a href="..\gerenciar_modulos\page-menu.php" class="navbar-brand">
            <span class="img-logo"></span>
          </a>
        </div>
        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#" id="exampleModal">Olá, <?= $_SESSION['usuario'] ?></a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="../../sair.php">Sair</a></li>
          </ul>
        </div>
      </div><!-- /container -->
    </nav><!-- /nav -->

    <!-- Conteudos -->
    <div class="capa">
      <div class="texto-modulos" style="padding-top: 150px;padding-bottom: 50px;">
        <a href="..\gerenciar_produtos\Adicionar\page-prod-adicionar.php" class="btn btn-custom item-modulos btn-lg">(+) Adicionar</a>
        <a href="..\gerenciar_produtos\Consultar\page-prod-consultar.php" class="btn btn-custom item-modulos btn-lg">&#9675 Consultar</a>
        <br style="margin-bottom: 50px;" />
        <a href="..\gerenciar_produtos\Editar\page-prod-editar.php" class="btn btn-custom item-modulos btn-lg">&#10000 Alterar</a>
        <a href="..\gerenciar_produtos\Excluir\page-prod-excluir.php" class="btn btn-custom item-modulos btn-lg">&#10008 Excluir</a>
        <a href="..\gerenciar_modulos\page-menu.php" class="btn btn-custom item-modulos btn-lg">&#9754 Voltar</a>
      </div>
    </div>

    <!-- RODAPÉ -->
    <footer id="rodape" style="margin-top: 200px;">
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
              <li class="item-rede-social"><a href=""><img src="../../imagens/facebook.png"></a></li>
              <li class="item-rede-social"><a href=""><img src="../../imagens/instagram.png"></a></li>
              <li class="item-rede-social"><a href=""><img src="../../imagens/twitter.png"></a></li>
            </ul>
          </div>
        </div><!-- /row -->
      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </div>
</body>

</html>