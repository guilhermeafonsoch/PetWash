<?php

include("functions.php");

$login_status = login_auth($_POST);

// $username = select_username($_POST['username']);

// json_decode($username, true);
// header('Content-Type: application/json');

if ($login_status){
    header("Location: home.html");
}   
else{
    header("Location: index.html");
}

?>