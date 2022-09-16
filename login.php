<?php

    require('function.php');

    $username=$_POST['login'];
    $password=$_POST['senha'];



    if($logado = verificaLogin($username, $password)){
        $_SESSION['logado'] = true;
        $_SESSION['username'] = $username;

       header("Location: home.php");
    } else {
        $_SESSION['logado'] = false;
        $_SESSION['error_login'] = "Usuário ou senha inválido";

        header("Location: index.php");
    }

?>