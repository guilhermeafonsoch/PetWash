<?php

include("conexao.php");

// ----------------------------------------------------------------------------------------
// ------------------------------------- INICIO -------------------------------------------
// ------------------------------------- BANCO --------------------------------------------
// ------------------------------------- INICIO -------------------------------------------
// ------------------------------------- BANCO --------------------------------------------
// ----------------------------------------------------------------------------------------

function insertDb($dbName, $table, $data){
    $columms = implode(", ", array_keys($data));
    $values = "'" . implode("', '", array_values($data)) . "'";
    $query = "INSERT INTO $table ($columms) VALUES ($values)";
    $conn = conexao($dbName);
	$dados = $conn->query($query);

    $close = fecha_conexao($conn);
    return $dados;
}

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

// ----------------------------------------------------------------------------------------
// ------------------------------------- FIM ----------------------------------------------
// ------------------------------------- BANCO---------------------------------------------
// ------------------------------------- FIM ----------------------------------------------
// ------------------------------------- BANCO---------------------------------------------
// ----------------------------------------------------------------------------------------

function email_validation($email){
    $where= "email = " . "'" . $email . "';";
    $data = selectDB("petwash", "customer", $campos = 'customer_id', $where);

    return $data;
}

function select_username($email){
    $where= "email = " . "'" . $email . "';";
    $data = selectDB("petwash", "customer", $campos = 'username', $where);
    $username = $data[0]["username"];

    return $username;
}

function login_auth($response){
    $logado = false;
    if (!impede_vazios($response)){
        return $logado;
    }
    $data = email_validation($response['email']);
    if (sizeof($data) > 0){
        $where= "customer_id = " . "'" . $data[0]['customer_id'] . "';"; 
        $data = selectDB("petwash", "customer", $campos = 'username, senha', $where);
        if  ($response['senha'] == $data[0]["senha"]){
            $logado = true;
        }
    }

    return $logado;
}


function sign_in($response){
    if (!impede_vazios($response)){
        
        return "Erro";
    }
    $data = email_validation($response['email']);
    if (sizeof($data) == 0){
        insertDb("petwash", "customer", $response);
    }
}

function impede_vazios($response){
    foreach ($response as $key => $value){
        if ($value == ''){

            return ($valido = false);
        }
    }

    return  $valido = true;
}

function valida_sessao(){
    if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
        header('location: index.html');
      }
}

?>