<?php
    header("Content-Type: text/html; charset=utf-8");
    $servidor = "128.127.1.6";
    $usuario = "nutricao";
    $senha = "Adminti18!";
    $banco = "NUTRICAO";

    $conecta = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta001 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta002 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta003 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta004 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta005 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta006 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta007 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta008 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta009 = new mysqli($servidor, $usuario, $senha, $banco);
    $conecta010 = new mysqli($servidor, $usuario, $senha, $banco);

    mysqli_query($conecta, "SET NAMES 'utf8'");
    mysqli_query($conecta, 'SET character_set_connection=utf8' );
    mysqli_query($conecta, 'SET character_set_client=utf8');
    mysqli_query($conecta, 'SET character_set_results=utf8');
?>