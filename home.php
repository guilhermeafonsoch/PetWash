<?php

require('conexao.php');

function verificaLogin($dados_banco){
    $match = false;
    foreach($dados_banco as $usuario => $value){
        if($_POST['login'] == '' || $_POST['senha'] == ''){
            return $match;
            break;
        }

        $login = $dados_banco[$usuario]['email'];

        if($login == $_POST['login']){

            $senha = $dados_banco[$usuario]['senha'];

            if($senha == $_POST['senha']){
                    $match = true;
                    return $match;
                    break;
                } 
            }
        }
    }
    return $match = false;

function info($match) {
    if($_POST['login'] == '' && $_POST['senha'] == ''){
        return[
            'Mensagem' => 'vazio',
            'login' => '',
            'senha' => ''
        ];
    } elseif($_POST['login'] == ''){
        return[
            'Mensagem' => 'vazio',
            'login' => '',
            'senha' => $_POST['senha']
        ];
    } elseif($_POST['senha'] == ''){
        return[
            'Mensagem' => 'vazio',
            'login' => $_POST['login'],
            'senha' => ''
        ];
    } elseif($match) {
        return[
            'Mensagem' => 'LOGOU!!!!!', 
            'login' => $_POST['login'],
            'senha' => $_POST['senha']
            
        ];
    } else{
        return[
            'Mensagem' => 'INVALIDO', 
            'login' => $_POST['login'],
            'senha' => $_POST['senha']     
        ];
    }
}

$dados_banco = selectDB($dbName, $table);
print_r($dados_banco);
die;

//passa o json para array
foreach($dados_banco as $usuario => $value){
    $dados_banco[$usuario]['senha'] = json_decode($dados_banco[$usuario]['senha'], true);
}

//validar com o Eduardo
$match = verificaLogin($dados);
header('Content-Type: application/json');

echo json_encode(info($match));

// INSERT INTO `petwash`.`petwash.customer` (`username`, `email`, `senha`) VALUES ('test', 'test', 'test');