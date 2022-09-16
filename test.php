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

function email_validation($email){
    $where= "email = " . "'" . $email . "';";
    $data = selectDB("petwash", "customer", $campos = 'customer_id', $where);
    return $data;

}

function login_auth($response){
    $r = [
        'Mensagem' => 'Usuário ou Senha Inválidos', 
        'email' => $response['email'],
        'senha' => $response['senha']     
    ];

    $data = email_validation($response['email']);

    
    if (sizeof($data) > 0) {
        $where= "customer_id = " . "'" . $data[0]['customer_id'] . "';"; 
        $data = selectDB("petwash", "customer", $campos = 'username, senha', $where);  
        if  ($response['senha'] == $data[0]["senha"]){
            $r = [
                'Mensagem' => 'Usuário Logado. Olá, ' . $data[0]["username"], 
                'email' => $response['email'],
                'senha' => $response['senha']     
            ];   
        }
        
    }

    echo(json_encode($r, JSON_UNESCAPED_UNICODE));
    
}


function sign_in($response){
    $message = "Informações inválidas.";
    $data = email_validation($response['email']);
    if (sizeof($data) == 0){
        // TODO: Fazer uma validação se o insert foi realizado com sucesso (por exemplo: AWS caiu o depois de entar nesse if e o insert vai dar erro)
        insertDb("petwash", "customer", $response);
        $message = "Usuário Cadastrado";
        
    }
    echo $message;
}

// Exemplo de fluxo:
// login_auth($response_2);
// echo '<br>';
// sign_in($response_2);
// echo '<br>';
// login_auth($response_2);
// echo '<br>';
// sign_in($response_2);

?>