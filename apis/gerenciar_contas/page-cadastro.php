<?php

$erro_usuario = isset($_GET['erro_usuario']) ? $_GET['erro_usuario'] : 0;
$erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;

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

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="img-back-cadastro">
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
            <li><a href="../../apis/gerenciar_contas/page-login.php">Entrar</a></li>
          </ul>
        </div>
      </div><!-- /container -->
    </nav><!-- /nav -->

    <div class="capa" style="padding-top: 20px;padding-bottom: 100px;">
      <div class="texto-cadastro">
        <h1 id="texto-cadastro">Preencha o formulario</h1>
        <div class="container">
          <form name="frmCadastro" method="post" action="registra-usuario.php" id="formCadastrarse">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputCNPJ">CNPJ</label>
                <input type="text" class="form-control" placeholder="CNPJ" name="CNPJ" required>
              </div>

              <div class="form-group col-md-6">
                <label for="inputRazao">Razão Social</label>
                <input type="Razao" class="form-control" maxlength="30" placeholder="Razão Social" name="RazaoSocial" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress">Endereço</label>
                <input type="text" class="form-control" maxlength="50" placeholder="Endereco" name="Endereco" required>
              </div>

              <div class="form-group col-md-6">
                <label for="inputZip">CEP</label>
                <input type="text" class="form-control" placeholder="CEP" name="CEP" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-9">
                <label for="inputCity">Cidade</label>
                <input type="text" class="form-control" maxlength="50" placeholder="Cidade" name="Cidade" required>
              </div>

              <div class="form-group col-md-3">
                <label for="inputState">Estado</label>
                <select class="form-control" name="Estado">
                  <option selected>Escolha...</option>
                  <option value="AC"> Acre </option>
                  <option value="AL"> Alagoas </option>
                  <option value="AP"> Amapá </option>
                  <option value="AM"> Amazonas </option>
                  <option value="BA"> Bahia </option>
                  <option value="CE"> Ceará </option>
                  <option value="DF"> Distrito Federal </option>
                  <option value="ES"> Espírito Santo </option>
                  <option value="GO"> Goiás </option>
                  <option value="MA"> Maranhão </option>
                  <option value="MS"> Mato Grosso do Sul </option>
                  <option value="MT"> Mato Grosso </option>
                  <option value="MG"> Minas Gerais </option>
                  <option value="PA"> Pará </option>
                  <option value="PB"> Paraíba </option>
                  <option value="PR"> Paraná </option>
                  <option value="PE"> Pernambuco </option>
                  <option value="PI"> Piauí </option>
                  <option value="RJ"> Rio de Janeiro </option>
                  <option value="RN"> Rio Grande do Norte </option>
                  <option value="RS"> Rio Grande do Sul </option>
                  <option value="RO"> Rondônia </option>
                  <option value="RR"> Roraima </option>
                  <option value="SC"> Santa Catarina </option>
                  <option value="SP"> São Paulo </option>
                  <option value="SE"> Sergipe </option>
                  <option value="TO"> Tocantins </option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-8">
                <label for="inputEmail4">Email</label>
                <input type="text" class="form-control" maxlength="50" placeholder="Email" name="Email" required>
              </div>

              <div class="form-group col-md-4">
                <label for="inputfone">Telefone</label>
                <input type="fone" class="form-control" maxlength="30" placeholder="Fone" name="Fone" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword4">Senha</label>
                <small id="passwordHelpInline" class="text-muted">
                  *Deve ter entre 8 e 20 caracteres.
                </small>
                <input type="password" class="form-control" maxlength="30" placeholder="Senha" name="Senha" required>
              </div>

              <div class="form-group col-md-6">
                <label for="inputPassword4">Confirme a Senha</label>
                <input type="password" class="form-control" maxlength="30" placeholder="Confirme a Senha" name="confSenha" required>
              </div>
            </div>

            <div class="form-row">
              <button type="submit" id="envia" class="btn btn-primary">Cadastrar</button>
            </div>
            <!-- <div class="form-group">

              <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário (máx 20 caracteres)" required="requiored" maxlength="20">

              <?php
              if ($erro_usuario) { //valor de 1 ou de 0
                echo '<font style="color:#FF0000">Usuário ja existe</font>';
              }
              ?>

            </div>

            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">

              <?php
              if ($erro_email) { //valor de 1 ou de 0
                echo '<font style="color:#FF0000">Email ja existe</font>';
              }
              ?>

            </div>

            <div class="form-group">
              <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha (máx 32 caracteres)" required="requiored" maxlength="32">
            </div> -->
          </form>
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