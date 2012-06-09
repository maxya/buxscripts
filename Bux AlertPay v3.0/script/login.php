<?
session_start();


if ($_POST['username']) {





if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 

 include('header.php'); 


echo "<br><br>SECURITY CODE ERROR... "; 

include('footer.php');

exit();
}


//Comprobacion del envio del nombre de usuario y password
require('funciones.php');
$username=uc($_POST['username']);
$password=uc($_POST['password']);

if ($password==NULL) {
echo "La password no fue enviada";
}else{
require('config.php');
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
echo "Login incorrecto";
}else{
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
mysql_close($con);
$nicke=$row['username'];
$passe=$row['password'];

//90 dias dura la cookie
setcookie("usNick",$nicke,time()+7776000);
setcookie("usPass",$passe,time()+7776000);


$lastlogdate=time();
$lastip = getRealIP();
require('config.php');
$querybt = "UPDATE tb_users SET lastlogdate='$lastlogdate', lastiplog='$lastip' WHERE username='$nicke'";
mysql_query($querybt) or die(mysql_error());
mysql_close($con);

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=members.php">

<?
}
}
}else{
?>
<? include('header.php'); ?>

<h3>Login</h3>
<br />

<a href="register.php">New User Register Free Account</a>
<br>
<a href="recoverpwd.php">Lost password?</a>
<br><br>


<div align="center"><div id="form">
<fieldset>
<legend>Login</legend>

<form action='login.php' method='POST'>

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Username</label></p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='25' name='username' autocomplete="off"value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Password</label></p></td>
	<td width="250" align="left"><input type='password' size='15' maxlength='25' name='password' autocomplete="off" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Security Code </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Enter" class="submit" tabindex="4" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>





<? include('footer.php'); ?>
<?
}
?>