<?php

const HOSTNAME = "petwash.cjpk81kuqb7j.us-east-1.rds.amazonaws.com";
const USERNAME = "root";
const PORT = "3306";
const PASSWORD = "^aNaHgGzc*M4";
$dbName = "petwash";
$table = "petwash.customer";

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


function insertDb($dbName, $table, $data){
    $columms = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columms) VALUES ($values)";
    $conn = conexao($dbName);
	$dados = $conn->query($query);

    $close = fecha_conexao($conn);

    return $dados;
}

insertDb($dbName, $table, ["username" => "Tony", "email" => "tony@gmail.com", "senha" => "auau123"]);


function selectDB($dbName, $table, $campos = '*', $where = ''){
    if ($where != ''){
        $where = ' WHERE ' . $where; 
    }
    $query = "SELECT $campos FROM $table" . $where;
    $conn = conexao($dbName);
	$dados = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    
    $close = fecha_conexao($conn);

    return $dados;
}

function deleteIdDb($dbName, $table, $id_del = '', $where = ''){
    if ($where == '' && $id_del == ''){
        echo '<p>error</p>';
        die;
    }
    else if ($where == ''){
        $id_del = "id = '" . $id_del . "'";
    }
    $query = "DELETE FROM $table WHERE $id_del $where";;
    $conn = conexao($dbName);
	$dados = $conn->query($query);

    $close = fecha_conexao($conn);

    return $dados;
}

function updateBanco($dbName, $table, $set, $where){
    $query = "UPDATE $table SET $set WHERE $where";
    $conn = conexao($dbName);
	$dados = $conn->query($query);

    $close = fecha_conexao($conn);

    return $dados;
};
?>