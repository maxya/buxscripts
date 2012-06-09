<?php

// Database configuration

$bd_host = "localhost";
$bd_usuario = "логин MySQL";
$bd_password = "пароль";
$bd_base = "имя MySQL базы";

$con = mysql_connect($bd_host, $bd_usuario, $bd_password); mysql_select_db($bd_base, $con);

?>