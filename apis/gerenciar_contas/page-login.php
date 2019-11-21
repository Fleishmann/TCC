<?php

use Symfony\Component\Mime\Message;

$erro = isset($_GET['erro']) ? ($_GET['erro']) : 0;
?>

<?php
$cadastrado = isset($_GET['cadastrado']) ? ($_GET['cadastrado']) : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>E-conomy Center - Gestor Empresarial</title>
  <link rel="icon" href="../../imagens/logoSoMarca.png">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Bootstrap -->
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../estilo.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="img-back-login">
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

          <a href="../../index.php" class="navbar-brand">
            <span class="img-logo"></span>
          </a>
        </div>
        <!-- navbar -->
        <div class="collapse navbar-collapse" id="barra-navegacao">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../../index.php">Início</a></li>
            <li class="divisor" role="separator"></li>
            <li><a href="../gerenciar_contas/page-cadastro.php">Cadastrar-se</a></li>
          </ul>
        </div>
      </div><!-- /container -->
    </nav><!-- /nav -->

    <div class="capa" style="padding-top: 200px;padding-bottom: 200px;">
      <div class="texto-centro">
        <h4 id="texto-cadastro">Gestor E-conomy Center</h4>
        <div class="container">
          <br /><br />
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <form method="post" action="validar-acesso.php" id="formLogin">
              <div class="form-group">
                <input type="text" class="form-control" id="campo_usuario" name="idEmail" placeholder="ID ou Email" required>
              </div>

              <div class="form-group">
                <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" required>
              </div>

              <button type="buttom" class="btn btn-custom btn-roxo btn-lg" id="btn_login">Login</button>
            </form>

            <?php
            if ($erro == 1) {
              ?>
              <script>
                swal("Ops", "Informe o Id/Email ou Senha corretamente", "error");
              </script>
            <?php
            }
            ?>

            <?php
            if ($cadastrado == 1) {
              ?>
              <script>
                swal("Parabéns!", "Cadastro realizado com sucesso", "success");
              </script>
            <?php
            }
            ?>
          </div>
        </div>
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