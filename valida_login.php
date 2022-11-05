<?php

session_start();

include("functions.php");

$login_status = login_auth($_POST);
$login = $_POST['email'];
$senha = $_POST['senha']; 

if($login_status){
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;

    header("Location: agenda.php");
}   
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);

    header("Location: index.html");
}

?>