<?php
/*
TODO:
ATENÇÃO

NENHUMA DAS FUNÇÕES ESTÁ FAZENDO VALIDAÇÃO SE OS CAMPOS ESTÃO PREENCHIDOS 
OU SE EXISTEM CARACTERES MAL INTENCIONADOS NO INPUT DO USUARIO

FUNÇÃO A SER REALIZADA

*/
include("conexao.php");

/* exemplo de response que vamos receber*/
$response = [
    'email' => 'tony@gmail.com',
    'senha' => 'auau123'
];

$response_2 = [
    'email' => 'gg@gmail.com',
    'username' => 'AfonsoGG',
    'senha' => 'naoseihmmm123'
];
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
    $query = "SELECT $campos FROM $dbName.$table" . $where;
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

function login_auth($response){
    $logado = false;
    if (!impede_vazios($response)){
        return $logado;
    }
    // $r = [
    //     'Mensagem' => 'Usuário ou Senha Inválidos', 
    //     'email' => $response['email'],
    //     'senha' => $response['senha']     
    // ];

    $data = email_validation($response['email']);

    if (sizeof($data) > 0) {
        $where= "customer_id = " . "'" . $data[0]['customer_id'] . "';"; 
        $data = selectDB("petwash", "customer", $campos = 'username, senha', $where);  
        /*TODO: Comparar senhas usando hash */
        if  ($response['senha'] == $data[0]["senha"]){
            $logado = true;
            // $r = [
            //     'Mensagem' => 'Usuário Logado. Olá, ' . $data[0]["username"], 
            //     'email' => $response['email'],
            //     'senha' => $response['senha']     
            // ];   
        }
    }

    // echo(json_encode($r, JSON_UNESCAPED_UNICODE));
    return $logado;
}


function sign_in($response){
    // $message = "Informações inválidas.";
    if (!impede_vazios($response)){
        return "Erro";
    }
    // if (!confirma_senha($response)){
    //     return "Erro";
    // }
    $data = email_validation($response['email']);
    if (sizeof($data) == 0){
        // TODO: Fazer uma validação se o insert foi realizado com sucesso (por exemplo: AWS caiu o depois de entar nesse if e o insert vai dar erro)
        insertDb("petwash", "customer", $response);
        // $message = "Usuário Cadastrado";
        
    }
    // echo $message;
}

function impede_vazios($response){
    foreach ($response as $key => $value){
        if ($value == ''){
            return ($valido = false);
        }
    }
    
    return $valido = true;
}

// function confirma_senha($response){
//     if ($response['senha'] == $response['confirma_senha']){
//         return ($password = true);
//     }
//     else{
//         return $password = false;
//     }    
// }

// Exemplo de fluxo:
// login_auth($response_2);
// echo '<br>';
// sign_in($response_2);
// echo '<br>';
// login_auth($response_2);
// echo '<br>';
// sign_in($response_2);
?>