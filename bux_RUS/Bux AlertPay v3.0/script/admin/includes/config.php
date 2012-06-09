<?php

// Database configuration

$bd_host = "localhost";
$bd_usuario = "root";
$bd_password = "fefedede";
$bd_base = "24";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); mysql_select_db($bd_base, $con);

?>
