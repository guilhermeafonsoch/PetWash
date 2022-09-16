<?php

require('function.php');
isLogado();

$username = $_SESSION['username'];
echo "Estou [".$username."] no sistema";


?>