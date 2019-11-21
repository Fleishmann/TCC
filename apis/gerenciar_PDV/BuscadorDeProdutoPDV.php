<?php

session_start();

require_once('../db.class.php');

$busca = $_POST['search'];

$sql = "SELECT * FROM produtos WHERE nomeProduto LIKE '%$busca%' AND idEmpresa = " . $_SESSION['id'] . " ORDER BY codprodControle LIMIT 5";

$objDb = new db();
$link = $objDb->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);
$qtd = mysqli_num_rows($resultado_id);
?>
<div id="resultadoItenAdd" style="margin-right: 20px;margin-left: 20px;">
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