<?php

include 'secret.php';

// $salt = '256 caracteres';
// hash('sha256','senha'.$salt);

function conexao($dbName){
    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, $dbName, PORT);
    mysqli_set_charset($connection,"utf8");
    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $connection;
}

function fecha_conexao($connection){

    $close_connection = mysqli_close($connection);
    if (!$close_connection) {
        die("Close connection failed: " . mysqli_connect_error());
    }

    return $connection;
}


?>