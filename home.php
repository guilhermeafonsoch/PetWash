<?php

session_start();

if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  header('location:index.html');
}

$logado = $_SESSION['login'];

include("functions.php");

$where= "email = " . "'" . $_SESSION['login'] . "';";

$dados_usuario = selectDB($dbName, $table, $campos = '*', $where);

$username = $dados_usuario[0]["username"];
$email = $dados_usuario[0]["email"];

?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/home.css">
    <title>HOME</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <h1>Bem vindo!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">  
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Usuário</li>
                <li class="list-group-item"><?php echo $username; ?></li>
            </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 18rem;">  
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Email</li>
                <li class="list-group-item"><?php echo $email; ?></li>
            </ul>
            </div>
        </div>
    </div>
</body>
</html>
-->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seu perfil</title>

    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <!-- Ícone de import css -->
    <link rel="stylesheet" href="src/styles/main.css">
    <link rel="shortcut icon" type="image/png" href="src/img/logov2.png">

</head>

<body>

    <!-- Import Script Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>

    <!-- Header com logo -->
    <div class="container-flex">
        <header class="d-flex px-1 py-3 mb-5 border-bottom justify-content-between align-items-center">
            <a href="agenda.php">
                <input type="image" src="src/img/logo_com_texto2.png" class="header-logo px-5 py-2" alt="PetWash Logo">
            </a>

            <a href="home.php">
                <input type="image" src="src/img/person-circle.svg" class="header-pficon px-5 py-2" alt="Profile Icon">
            </a>

        </header>
    </div>

    <div class="container-flex justify-content-start profile-welcome">
        <img src="src/img/person-circle.svg">
        <p>Bem vindo, <?php echo $username; ?>!</p>
    </div>

    <div class="profile-container-flex justify-content-start mt-5">
        <div class="d-flex flex-column pf-item">
            <p class="pf-item-name">Usuário</p>
            <p class="pf-desc"><?php echo $username; ?></p>
        </div>

        <div class="d-flex flex-column pf-item">
            <p class="pf-item-name">Email</p>
            <p class="pf-desc"><?php echo $email; ?></p>
        </div>
    </div>

</body>

</html>