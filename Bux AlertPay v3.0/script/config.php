<?php

// Database configuration

$bd_host = "localhost";
$bd_usuario = "username";
$bd_password = "password";
$bd_base = "buxscript";
$url = "http://yourdomain.com";
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); mysql_select_db($bd_base, $con);

?>
