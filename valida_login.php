<?php

include("functions.php");

$login_status = login_auth($_POST);

if ($login_status){
    header("Location: home.html");
}   
else{
    header("Location: index.html");
}

?>