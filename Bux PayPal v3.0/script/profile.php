<? 
session_start();
?>
<? include('header.php'); ?>


<h3>Edit Your Profile</h3>
<br>
<?



// incluimos archivos necesarios

require('config.php');

if (isset($_POST["password"])) {
 

if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "SECURITY CODE ERROR... ";include('footer.php'); exit();
}

// Declaramos las variables
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
$pemail = $_POST["pemail"];
$country = $_POST["country"];


// comprobamos que no haya campos en blanco

if($password==NULL|$cpassword==NULL|$email==NULL|$pemail==NULL|$country==NULL) {
echo "All Fields Are Required.";
}else{


// sanitizamos las variables

$password = uc($password);
$cpassword = uc($cpassword);
$email = limpiar($email);
$pemail = limpiar($pemail);
$country = limpiar($country);


// limitamos el numero de caracteres

$password=limitatexto($password,15);
$cpassword=limitatexto($cpassword,15);
$email=limitatexto($email,100);
$pemail=limitatexto($pemail,100);
$country=limitatexto($country,15);


// comprobamos que tengan un minimo de caracteres

minimopass($password);


// ¿Coinciden las contraseñas?
if($password!=$cpassword) {
echo "Password do not Match";
}else{





// Comprobamos que sea un email valido
ValidaMail($email);


// Comprobamos que sea un email valido
ValidaMail($pemail);


// Comprobamos que no se haya creado otra cuenta desde la misma ip

$laip = getRealIP();










$trok=uc($_COOKIE["usNick"]);

// Si todo parece correcto procedemos con la inserccion

$queryb = "UPDATE tb_users SET password='$password', ip='$laip', email='$email', pemail='$pemail', country='$country' WHERE username='$trok'";
mysql_query($queryb) or die(mysql_error());

echo "...";

?>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=logoutp.php">
<?

}


}

// En caso de no haber sido enviado los datos mostramos el formulario

}else{

$uzer=uc($_COOKIE["usNick"]);
$pazz=uc($_COOKIE["usPass"]);

$sql = "SELECT * FROM tb_users WHERE username='$uzer'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

if ($pazz != $row["password"]){ exit(); }


?>


<div align="center"><div id="form">
<fieldset><legend>&nbsp;All Fields Required&nbsp;</legend>



<form action="profile.php" method="POST">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Password</label></label></p></td>
    <td width="250" align="left"><input type="password" size="25" maxlength="15" name="password" value="<? echo $row["password"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Password</label></p></td>
    <td width="250" align="left"><input type="password" size="25" maxlength="15" name="cpassword" value="<? echo $row["password"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Email Address</label></p></td>
    <td width="250" align="left"><input type="text" size="25" maxlength="100" name="email" value="<? echo $row["email"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>PayPal E-mail</label></p></td>
    <td width="250" align="left"><input type="text" size="25" maxlength="100" name="pemail" value="<? echo $row["pemail"]; ?>" class="field" value="" tabindex="1" /></td>
  </tr>
 <tr>
    <td width="150" align="left"><p><label>Country</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="country" autocomplete="off" class="field" value="<? echo $row["country"]; ?>" tabindex="1" /></td>
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

<?
}
mysql_close($con);
?>








		<!--footer starts here-->
<? include('footer.php'); ?>