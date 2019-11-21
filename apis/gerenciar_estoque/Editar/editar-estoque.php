<?php

session_start();

require_once('../../db.class.php');

$busca = $_POST['busca'];

$sql = "SELECT * FROM produtos WHERE nomeProduto LIKE '%$busca%' AND idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$qtd = mysqli_num_rows($resultado_id);
?>
<div id="resultadoBusca" style="margin-right: 0px;">
    <table id="BuscaProdutos" class="table table-striped table-advanced table-hover">
        <thead>
            <tr>
                <th><i class="icon_profile"></i> ID </th>
                <th><i class="icon_profile"></i> Nome </th>
                <th><i class="icon_profile"></i> Quantidade </th>
                <th><i class="icon_profile"></i> Editar Produtos </th>
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
                    <td style='color: <?php echo $color ?>; font-weight: 900;'><?= $linha['quantidade']; ?></td>
                    <td><a href="page-editando-estoque.php?codprod='<?= base64_encode($linha['codprod']) ?>'">Editar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../page-estoque.php" class="btn btn-primary btn-lg" style="margin-top: 20px; margin-left: 425px;">☚ Voltar</a>
</div>