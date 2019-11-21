<?php

session_start();

if (!isset($_SESSION['usuario'])) {
  header('Location: ../../index.php?erro=1');
}

require_once('../db.class.php');

$sql = "SELECT * FROM produtos WHERE idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle LIMIT 5";

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
  <link rel="icon" href="../../imagens/logoSoMarca.png">

  <!-- Busca via jquery -->
  <script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
  <link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../estilo.css" rel="stylesheet">
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
    <div class="container">
      <table id="pdvProdutos" style="margin-left: 40px;">
        <tbody>
          <tr>
            <th><i class="icon_profile"></i> CodProd </th>
            <th><i class="icon_profile"></i> Nome Produto </th>
            <th><i class="icon_profile"></i> qtde </th>
            <th><i class="icon_profile"></i> Preço unitario </th>
            <th><i class="icon_profile"></i> Total </th>
          </tr>
          <tr>
            <td id="codprod"></td>
            <td id="nomeProd"></td>
            <td id="qtd" contenteditable="true"></td>
            <td id="PreçoUni"></td>
            <td id="Total"></td>
          </tr>
        </tbody>
      </table>

      <div id="borda" style="margin-left: 800px;margin-top: -25px;border-left-width: 2px;border-left-style: solid;border-top-width: 2px;border-top-style: solid;border-right-width: 2px;border-right-style: solid;border-bottom-width: 2px;border-bottom-style: solid;margin-bottom: 50px;padding-left: 200px;margin-right: 10px;">
        <h4 style="font-size: 37px;padding-top: 10px;padding-bottom: 10px;">TOTAL</h4>
        <h4 style="font-size: 37px;margin-left: -200px;border-top-width: 2px;border-top-style: solid;padding-top: 10px;">
        </h4>
        <h4 style="font-size: 37px;padding-left: 20px;padding-bottom: 10px;">Pgto</h4>
      </div>

      <div id="borda" style="border-top-width: 2px;border-top-style: solid;border-left-width: 2px;border-left-style: solid;border-bottom-width: 2px;border-bottom-style: solid;border-right-width: 2px;border-right-style: solid;margin-left: 800px;margin-right: 10px;margin-bottom: 200px;">
        <form id="buscarProdutoPDV">
          <div class="form-group" style="padding-left: 10px;padding-right: 80px;">
            <input type="text" class="form-control" id="search" name="search" placeholder="Produto" maxlength="20" style="margin-top: 10px;padding-right: 100px;">
          </div>
        </form>
        <div class="form-group" style="padding-left: 10px;padding-right: 80px;margin-bottom: 0px;margin-top: -35px;">
          <button class="btn btn-primary form-control glyphicon glyphicon-search" style="width:50px;left: 250px;top: -15px;"></button>
        </div>
        <div id="resultadoDaBusca" style="margin-right: 20px;margin-left: 20px;">
          <table id="BuscaProdutos" class="table table-striped table-advanced table-hover">
            <thead>
              <tr>
                <th><i class="icon_profile"></i> ID </th>
                <th><i class="icon_profile"></i> Nome </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($linha = mysqli_fetch_assoc($resultado_id)) {
                ?>
                <tr>
                  <td><?= $linha['codprodControle']; ?></td>
                  <td><?= $linha['nomeProduto']; ?></td>
                  <!-- <td><a href="SelecionaIten.php?codprod='<?= base64_encode($linha['codprod']) ?>'" onclick="carregaDados(<?php echo $linha['codprod'] ?>)">Selecionar</a></td> -->
                  <td><a href="#" onclick="carregaDados(<?php echo $linha['codprod'] ?>)">Selecionar</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- RODAPÉ -->
  <footer id="rodape" style="margin-top: -100px;">
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

  <script src="atualiza-PDV.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../../bootstrap/js/bootstrap.min.js"></script>

  <script>
    function carregaDados(id) {
      $.ajax({
        url: 'SelecionaIten.php',
        type: 'POST',
        dataType: 'html',
        data: id,
        success: function(response) {
          console.log(response);

          //Para Escrever em Paragrafos ( p ) de forma resumida
          $("#codprod").html(response.codprodControle);
          $("#nomeProd").html(response.nomeProduto);
          $("#qtd").html(response.quantidade);
          $("#PreçoUni").html(response.preco);
          $("Total").html('teste');

        }
      });
    }
  </script>
</body>

</html>