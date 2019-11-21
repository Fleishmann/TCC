<?php
session_start();

require_once('../../db.class.php');

$sql = "SELECT * FROM produtos WHERE idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$qtd = mysqli_num_rows($resultado_id);

$editado = isset($_GET['editado']) ? ($_GET['editado']) : 0;
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
        <form id="buscarProdutoEstoque" style="margin-left: 500px;margin-right: 500px;margin-bottom: 20px;">
            Buscar por:<input class="form-control form-control-lg" type="text" name="busca" id="busca">
        </form>
        <div id="resultadoBusca" style="margin-right: 200px;margin-left: 200px;">
            <table id="BuscaProdutos" class="table table-striped table-advanced table-hover">
                <thead>
                    <tr>
                        <th><i class="icon_profile"></i> ID </th>
                        <th><i class="icon_profile"></i> Nome </th>
                        <th><i class="icon_profile"></i> Quantidade </th>
                        <th><i class="icon_profile"></i> Editar Estoque </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($linha = mysqli_fetch_assoc($resultado_id)) {

                        $valor =  $linha['quantidade'];

                        if ($valor > 5) {
                            $color = "green";
                        } else {
                            $color = "red";
                        }
                        ?>
                        <tr>
                            <td><?= $linha['codprodControle']; ?></td>
                            <td><?= $linha['nomeProduto']; ?></td>
                            <td style='color: <?php echo $color?>; font-weight: 900;'><?= $linha['quantidade']; ?></td>
                            <td><a href="page-editando-estoque.php?codprod='<?= base64_encode($linha['codprod']) ?>'">Editar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a href="../page-estoque.php" class="btn btn-primary btn-lg" style="margin-top: 20px; margin-left: 425px;">☚ Voltar</a>
        </div>
    </div>
    <?php
    if ($editado == 1) {
        ?>
        <script>
            swal("Parabéns!", "Edição realizada com sucesso", "success");
        </script>
    <?php
    }
    ?>
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

    <script src="atualiza-editar.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>