<?php
include("test.php");

sign_in($_POST);

header("Location: src/templates/index.html");
?>