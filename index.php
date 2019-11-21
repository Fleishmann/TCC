<?php
$deslogado = isset($_GET['deslogado']) ? ($_GET['deslogado']) : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>E-conomy Center - Gestor Empresarial</title>
  <link rel="icon" href="imagens/logoSoMarca.png">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="estilo.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="img-back-inicio">
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
          <a href="index.php" class="navbar-brand">
            <span class="img-logo"></span>
          </a>

        </div>

        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="apis\gerenciar_contas\page-login.php">Entrar</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="apis\gerenciar_contas\page-cadastro.php">Cadastrar-se</a></li>
          </ul>
        </div>

      </div><!-- /container -->
    </nav><!-- /nav -->

    <!-- Conteudo -->
    <div class="capa">
      <div class="texto-capa" style="padding-top: 100px;padding-bottom: 100px;">
        <span class="img-central"></span>
        <h4>
          <?php
          if ($deslogado == 1) {
            ?>
            <script>
              swal("Deslogado!", "Você deslogou do sistema", "warning");
            </script>
          <?php
          }
          ?>
        </h4>
        <a href="apis\gerenciar_contas\page-login.php" class="btn btn-custom btn-roxo btn-lg">Entrar</a>
        <a href="apis\gerenciar_contas\page-cadastro.php" class="btn btn-custom btn-branco btn-lg">Cadastrar</a>
      </div>
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
              <li class="item-rede-social"><a href=""><img src="imagens/facebook.png"></a></li>
              <li class="item-rede-social"><a href=""><img src="imagens/instagram.png"></a></li>
              <li class="item-rede-social"><a href=""><img src="imagens/twitter.png"></a></li>
            </ul>
          </div>


        </div><!-- /row -->


      </div>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </div>
</body>

</html>