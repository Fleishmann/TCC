<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: ../../../index.php?erro=1');
}

require_once('../../db.class.php');

$codprod = $_GET['codprod']; 
$codprod = base64_decode($codprod);

$sql = "SELECT * FROM produtos WHERE codprod = $codprod AND idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$linha = mysqli_fetch_assoc($resultado_id);

$cadastrado = isset($_GET['cadastrado']) ? ($_GET['cadastrado']) : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>E-conomy Center - Gestor Empresarial</title>
  <link rel="icon" href="../../../imagens/logoSoMarca.png">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
    <div class="texto-cadastro">
      <h1 id="texto-cadastro">Editar produto</h1>

      <div class="container">

        <br /><br />
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <form method="post" action="editando-estoque.php" id="formAdicionar">
            <input id="codprod" name="codprod" type="hidden" value="<?php echo $linha['codprod']; ?>">
            <div class="form-group">
              <input type="text" class="form-control" id="codprod" name="codprodControle" placeholder="Codigo do Produto" required="requiored" maxlength="20" value="<?php echo $linha['codprodControle']; ?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do produto" required="requiored" maxlength="20" value="<?php echo $linha['nomeProduto']; ?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca" value="<?php echo $linha['marca']; ?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" value="<?php echo $linha['modelo']; ?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="cor" name="cor" placeholder="cor" value="<?php echo $linha['cor']; ?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="unidade" name="unidade" placeholder="Unidade de Medida" value="<?php echo $linha['unidade']; ?>">
            </div>

            <div class="form-group">
              <input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade - Até 5 digitos" required="requiored" maxlength="5" value="<?php echo $linha['quantidade']; ?>">
            </div>

            <div class="form-group">
              <input type="number" class="form-control" id="preco" name="preco" placeholder="Preço R$ - Use o ponto ao invés de virgula " required="requiored" maxlength="5" value="<?php echo $linha['preco']; ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
            <a href="page-esto-editar.php" class="btn btn-primary btn-lg">&#9754 Voltar</a>
            <br />
            <?php
            if ($cadastrado == 1) {
              ?>
              <script>
                swal("Parabéns!", "Cadastro realizado com sucesso", "success");
              </script>
            <?php
            }
            ?>
          </form>
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