<?php

session_start();

require_once('../db.class.php');

if (!isset($_SESSION['usuario'])) {
  header('Location: ../../index.php?erro=1');
}

$alterado = isset($_GET['alterado']) ? ($_GET['alterado']) : 0;

$sql = "SELECT * FROM empresas WHERE id = " . $_SESSION['id'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$linha = mysqli_fetch_assoc($resultado_id);
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
</head>

<body>
  <div class="img-back-perfil">
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
          <a href="page-menu.php" class="navbar-brand">
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
      <div class="container">
        <form method="post" action="configuracao.php" id="formConfiguracao">
          <fieldset style="margin-top: 50px;margin-bottom: 50px;">
            <legend>Informações Basicas</legend>
            <p>Como devo ser chamado: <input type="text" name="alias" value="<?php echo $linha['apelido']; ?>"></p>
            <p style="margin-left: 145px;">ID: <input type="text" name="id" style="margin-left: 0px;" value="<?php echo $linha['id']; ?>" readonly></p>
            <p style="margin-left: 124px;">Email:<input type="text" name="email" style="margin-left: 5px;" value="<?php echo $linha['email']; ?>"></p>
            <p style="margin-left: 118px;">Senha:<input type="text" name="senha" style="margin-left: 4px;" value="<?php echo $linha['senha']; ?>"></p>
            <br />
            <fieldset class="elist">
              <legend>Informações Complementares</legend>
              <p style="margin-left: 76px;">Razão Social:<input type="text" name="razao" style="margin-left: 5px;" value="<?php echo $linha['razaoSocial']; ?>"></p>
              <p style="margin-left: 130px;">CEP: <input type="text" name="cep" style="margin-left: 1px;" value="<?php echo $linha['cep']; ?>"></p>
              <p style="margin-left: 97px;">Endereço: <input type="text" name="endereco" style="margin-left: 2px;" value="<?php echo $linha['endereco']; ?>"></p>
              <p style="margin-left: 113px;">Cidade: <input type="text" name="cidade" style="margin-left: 3px;" value="<?php echo $linha['cidade']; ?>"></p>
              <p style="margin-left: 115px;">Estado: <input type="text" name="estado" style="margin-left: 3px;" value="<?php echo $linha['estado']; ?>"></p>
              <p style="margin-left: 105px;">Telefone: <input type="text" name="telefone" style="margin-left: 4px;" value="<?php echo $linha['telefone']; ?>"></p>
              <p style="margin-left: 120px;">CNPJ: <input type="text" name="cnpj" style="margin-left: 5px;" value="<?php echo $linha['cnpj']; ?>"></p>
            </fieldset>
            <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
          </fieldset>
        </form>
        <?php
            if ($alterado == 1) {
              ?>
              <script>
                swal("AVISO!", "Saia do Sistema para Salvar as Informações", "info");
              </script>
            <?php
            }
            ?>
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

    <script>
      $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
      })
    </script>
  </div>
</body>

</html>