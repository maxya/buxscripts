	
	
	
	
<?


// Si estan definidas las variables de las cookies se procede a mostrar el menu pero no sin antes comprobar que los
// datos de las cookies verdaderamete son del usuario en cuestion.

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

// Se sanitizan los datos de las cokies

$user=uc($_COOKIE["usNick"]);

// Se selecciona la tabla tb_users donde el usuario es el que se provee en la cookie
require ('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
// Se sanitiza de nuevo la cookie

$wask = uc($_COOKIE["usNick"]);

// Se define $wesk como el nombre de usuario de la tabla tb_users

$wesk = $row['username'];

// Se comprueba que el dato de la cookie sea el mismo que el de la tabla, de lo contrario se muestra error, se termina
// el script y se borra la cookie.

if("$wesk" != "$wask") {
echo "Login incorrecto.";
?>
<input type="button" value="cтраница перезагрузки" onClick="window.location.reload()">
<?
exit();
}

// Se sanitiza la cookie usPass

$wazk = uc($_COOKIE["usPass"]);

// Se define $wezk como el nombre de usuario de la tabla tb_users

$wezk = $row['password'];

// Se comprueba que el dato de la cookie sea el mismo que el de la tabla, de lo contrario se muestra error, se termina
// el script y se borra la cookie.

if("$wezk" != "$wazk") {
echo "Login incorrecto.";
?>
<input type="button" value="cтраница перезагрузки" onClick="window.location.reload()">
<?
exit();
}

include('memberstats.php');

}
else
{



echo "
			<ul id=\"navmainlist\">
				<li><a href=\"login.php\">Вход</a></li>
				<li><a href=\"register.php?r=".$elref."\">Регистрация</a></li>
			</ul>
	";



}











?>
