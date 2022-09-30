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
