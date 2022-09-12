<?php

require('conexao.php');
 
$select = selectDB($dbName, $table, 'convidados', "anfitriao = '{$_POST['cadastro_anfitriao']}'");

$convidados = json_decode($select[0]['convidados'],true);

array_push($convidados['nome'],$_POST['cadastro_convidado']);

$convidados = json_encode($convidados,JSON_UNESCAPED_UNICODE);

$update = updateBanco($dbName, $table, "convidados = '$convidados'", "anfitriao = '{$_POST['cadastro_anfitriao']}'");

$select = selectDB($dbName, $table, $campos = '*', "anfitriao = '{$_POST['cadastro_anfitriao']}'");

function retorno(){
return[
    'Mensagem' => "Usuário {$_POST['cadastro_convidado']} cadastrado na lista do anfritrião {$_POST['cadastro_anfitriao']}"
];
}

json_encode(retorno($_POST));