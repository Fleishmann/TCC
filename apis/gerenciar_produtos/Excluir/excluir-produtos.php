<?php

session_start();

require_once('../../db.class.php');

$campo = $_POST['campo'];

$sql = "SELECT * FROM produtos WHERE nomeProduto LIKE '%$campo%' AND idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$qtd = mysqli_num_rows($resultado_id);
?>
<div id="resultado" style="margin-right: 20px;margin-left: 20px;">
    <table id="BuscaProdutos" class="table table-striped table-advanced table-hover">
        <thead>
            <tr>
                <th><i class="icon_profile"></i> ID </th>
                <th><i class="icon_profile"></i> Nome </th>
                <th><i class="icon_profile"></i> Marca </th>
                <th><i class="icon_profile"></i> Modelo </th>
                <th><i class="icon_profile"></i> Cor </th>
                <th><i class="icon_profile"></i> Unidade </th>
                <th><i class="icon_profile"></i> Quantidade </th>
                <th><i class="icon_profile"></i> Preço </th>
                <th><i class="icon_profile"></i> Excluir Produtos </th>
            </tr>
        </thead>
        <tbody>
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
                    <td><a href="excluindo-produto.php?codprod='<?= base64_encode($linha['codprod']) ?>'">Excluir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="../page-produtos.php" class="btn btn-primary btn-lg" style="margin-top: 20px; margin-left: 600px;">☚ Voltar</a>
</div>
</div>