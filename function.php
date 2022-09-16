<?php
session_start();

// const HOSTNAME = "petwash.cjpk81kuqb7j.us-east-1.rds.amazonaws.com";
const HOSTNAME = "127.0.0.1";
const USERNAME = "root";
const PORT = "3306";
const PASSWORD = "";
const DBNAME = "petwash";
const TABLE = "`petwash.customer`";
// const PASSWORD = "^aNaHgGzc*M4";


//-------------------------------------------
# Database

function conexao(){
    $connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME, PORT);
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


function selectDB($query){


    $conn = conexao();
	$dados = $conn->query($query, MYSQLI_STORE_RESULT);
    

    $close = fecha_conexao($conn);
    return $dados;
}

//-------------------------------------------



function verificaLogin($username, $password){
    $logado = false;
    
    
    $dados = selectDB("select * from " .TABLE." where username='".$username."' and senha='".$password."'");
 
    if($dados->num_rows==1){
        $logado = true;
    }
    

    return $logado;
}


function isLogado(){
    if(!$_SESSION['logado']){
            header("Location: index.php");
    }

}

?>