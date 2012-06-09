<?php

// Database configuration

$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "XXXXXXX";
$bd_base = "XXXXXX";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); mysql_select_db($bd_base, $con);

?>
