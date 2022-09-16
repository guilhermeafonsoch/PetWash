<?php
require('function.php');

$erro = @$_SESSION['error_login'];
unset($_SESSION['error_login']);

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>PetWash</title>

    <!--Icone e import de css -->
    <link rel="shortcut icon" type="image/png" href="src/img/logo.png">
    <link rel="stylesheet" href="src/styles/main.css">
</head>
<body>
    <!-- Logo do PetShop-->
    <div class="logo">
        <img src="src/img/logo.png" alt="petshop">
    </div>
    
    <!-- Bloco Inteiro -->
    <div class="container">
                
        <!-- Formulario de Login -->
        <form class="formulario" method="POST" id="login" action="login.php">

            <h1 class="tituloFormulario">Login</h1>
            <div class="msgFormulario msgFormularioError"></div>

            <!--  Input Nome de Usuario -->
            <div class="gpInputFormulario">
                <input type="text" class="inputFormulario" autofocus placeholder="Email" name="login" id="login">
                <div class="inputFormularioErrorMsg"></div>
            </div>

            <!-- Input da Senha -->
            <div class="gpInputFormulario">
                <input type="password" class="inputFormulario" autofocus placeholder="Senha" name="senha" id="senha">
                <div class="inputFormularioErrorMsg">'.$erro.'</div>
            </div>

            <!--Botao de Login-->
            <button class="botaoContinueFormulario" type="submit">Continue</button>

            
        </form>

    </div>
   
</body>';


?>