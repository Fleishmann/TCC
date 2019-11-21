<?php

    session_start();

    require_once('../db.class.php');

    $idEmail = $_POST['idEmail'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, email, senha FROM empresas WHERE (email = '$idEmail' OR id = '$idEmail') AND senha = '$senha'";

    $sqlEmpresa = "SELECT id, apelido FROM empresas WHERE email = '$idEmail' AND senha = '$senha' ";

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    $row = mysqli_num_rows($resultado_id);


    $ResultadoEmpresa = mysqli_query($link, $sqlEmpresa);
    
    $DadosEmpresa = mysqli_fetch_array($ResultadoEmpresa, MYSQLI_ASSOC);

    $Empresa = $DadosEmpresa['id'];

    if($resultado_id){
        $dados_usuario = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);

        if($row == 1){
            $_SESSION['id'] = $Empresa;
            
            if ($DadosEmpresa['apelido'] == '')
            {
                $_SESSION['usuario'] = $idEmail;
            }
            else
                $_SESSION['usuario'] = $DadosEmpresa['apelido'];

            header('Location: ..\gerenciar_modulos\page-menu.php');
        } else {
            header('Location: page-login.php?erro=1');
        }
    } else {
        echo 'Erro na execução da consulta, favor entrar em contato com o admin do sistema.';
    }
?>