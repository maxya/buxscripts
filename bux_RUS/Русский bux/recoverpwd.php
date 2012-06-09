<?
session_start();

if ($_POST['email']) {

require('config.php');

session_start(); 
if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
	
include('header.php');

echo "<br><br>SECURITY CODE ERROR... ";
include('footer.php');
exit();
}


//Comprobacion del envio del nombre de usuario y password
function limpiar($mensaje)
{
$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
}
$email=limpiar($_POST['email']);

$checkpemail = mysql_query("SELECT * FROM tb_users WHERE email='$email'");
$pemail_exist = mysql_num_rows($checkpemail);

if ($pemail_exist<1) {
echo "Email должен быть.";
include('header.php');

echo "<br><br>Email должен быть.";
include('footer.php');
exit();
}

$sqle = "SELECT * FROM tb_users WHERE email='$email'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);

$elpass=$rowe["password"];
$eluser=$rowe["username"];

$dia=date("m.d.Y");
$hora=date("H:i:s");
$destinatari=$email;
$subject= "Востановление пароля";
$desde = 'From: recover@password.com'; // place your email address here
$contingut = "
Username: $eluser\n
Password: $elpass\n
";
mail($destinatari, $subject, $contingut, $desde);


?>

<?


}else{
?>



<? include('header.php'); ?>


<h3>Забили пароль?</h3>
<br>

<div align="center"><div id="form">
<fieldset>
<legend>&nbsp; Восстановление пароля&nbsp;</legend>
<form action='recoverpwd.php' method='POST'>

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Ваш e-mail:</label></p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='50' name='email' autocomplete="off" class="field" value="" tabindex="1" /></p>

</td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>код на картинке: </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="ок" class="submit" tabindex="4" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>




		<!--footer starts here-->
<? include('footer.php'); ?>
<?
}
?>
