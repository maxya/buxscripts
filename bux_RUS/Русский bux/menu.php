<div id="navtoplist">
<?


// Si estan definidas las variables de las cookies se procede a mostrar el menu pero no sin antes comprobar que los
// datos de las cookies verdaderamete son del usuario en cuestion.

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

// Se incluyen los archivos necesarios




// Se sanitizan los datos de las cokies

$user=uc($_COOKIE["usNick"]);

// Se selecciona la tabla tb_users donde el usuario es el que se provee en la cookie
require('config.php');
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
echo "Login �������.";
?>
<input type="button" value="Reload Page" onClick="window.location.reload()">
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
echo "Login �������.";
?>
<input type="button" value="Reload Page" onClick="window.location.reload()">
<?
exit();
}

echo"
			<ul>

				<li id=\"current\"><a href=\"surf.php\">�������� �������</a></li>";
// ver si es administrador
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
$administrator = $row['user_status'];

		if($administrator == "admin") {

				echo "<li><a href=\"admin/\" target=\"_blank\">�������</a></li>";
										}
echo"
				<li><a href=\"members.php\">�������</a></li>
				<li><a href=\"logout.php\">�����</a></li>
				<li><a href=\"faq.php\">FAQ</a></li>
				<li><a href=\"advertise.php\">�������������</a></li>
				<li><a href=\"contact.php\">��������</a></li>
				<li><a href=\"http://forum.allbux.ru/index.php\">�����</a></li>
			</ul>
			&nbsp;&nbsp;&nbsp;&nbsp;�� ����� ��� <span class='textblue'>".$row['username']."</span>
			";

if ($row['account'] ==""){
	echo"
			
			<span class='textsmall'>(��������)</span>
"; } else{
	echo"
			
			<span class='textsmall'>(premium)</span>
"; }

}
else
{

// funcion para sanitizar variables



echo "
			<ul>
				<li id=\"current\"><a href=\"surf.php?r=".$elref."\">�������� �������</a></li>
				<li><a href=\"register.php?r=".$elref."\">�����������</a></li>
				<li><a href=\"login.php?r=".$elref."\">����</a></li>
				<li><a href=\"faq.php?r=".$elref."\">FAQ</a></li>
				<li><a href=\"advertise.php?r=".$elref."\">�������������</a></li>
				<li><a href=\"contact.php?r=".$elref."\">��������</a></li>
			</ul>
";
}

?>

</div>
