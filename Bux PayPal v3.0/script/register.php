<? 
session_start();
?>
<? include('header.php'); ?>



<?

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

?>

<b><a href="#" onClick="window.location.reload()">Reload Page</a></b>

<? include('footer.php'); ?>


<? exit(); } ?>



<?



// incluimos archivos necesarios

require('config.php');
//require('admin/funciones.php');

if (isset($_POST["username"])) {
 
if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 

echo "<br><br>SECURITY CODE ERROR... "; 

include('footer.php'); exit();
}


// Declaramos las variables

$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$email = $_POST["email"];
$cemail = $_POST["cemail"];
$pemail = $_POST["pemail"];
$country = $_POST["country"];


// comprobamos que no haya campos en blanco

if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL|$cemail==NULL|$pemail==NULL|$country==NULL) {
echo "All Fields Required";
}else{


// sanitizamos las variables

$username = uc($username);
$password = uc($password);
$cpassword = uc($cpassword);
$email = limpiar($email);
$cemail = limpiar($cemail);
$pemail = limpiar($pemail);
$country = limpiar($country);


// limitamos el numero de caracteres

$username=limitatexto($username,15);
$password=limitatexto($password,15);
$cpassword=limitatexto($cpassword,15);
$email=limitatexto($email,100);
$cemail=limitatexto($cemail,100);
$pemail=limitatexto($pemail,100);
$country=limitatexto($country,15);


// comprobamos que tengan un minimo de caracteres

minimo($username);
minimopass($password);


// ¿Coinciden las contraseñas?
if($password!=$cpassword) {
echo "Passwords Do Not Match";
}else{


// ¿Coinciden los emails?
if($email!=$cemail) {
echo "Emails Do not Match";
}else{


// Comprobamos que sea un email valido
ValidaMail($email);


// Comprobamos que sea un email valido
ValidaMail($pemail);





// Comprobamos que no se haya creado otra cuenta desde la misma ip

$laip = getRealIP();


if($laip!="127.0.0.1")
{

    $checkip = mysql_query("SELECT ip FROM tb_users WHERE ip='$laip'");
    $ip_exist = mysql_num_rows($checkip);

}

if ($ip_exist>0) {
echo "Error: You have created an account.";
}else{


// Comprobamos que el nombre de usuario, email y el email de paypal no existan

$checkuser = mysql_query("SELECT username FROM tb_users WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);

$checkemail = mysql_query("SELECT email FROM tb_users WHERE email='$email'");
$email_exist = mysql_num_rows($checkemail);

$checkpemail = mysql_query("SELECT pemail FROM tb_users WHERE pemail='$pemail'");
$pemail_exist = mysql_num_rows($checkpemail);

if ($email_exist>0|$username_exist>0) {
echo "Username or Email Already in Use.";
}else{

if ($pemail_exist>0) {
echo "Your Paypal Address It's Already in Use.";
}else{


// Si se ha introducido un referer comprobamos que exista

if ($_POST["referer"] != "") {

// Sanitizamos la variable

$referer = limpiar($_POST["referer"]);
$referer=limitatexto($referer,15);

$checkref = mysql_query("SELECT username FROM tb_users WHERE username='$referer'");
$referer_exist = mysql_num_rows($checkref);

if ($referer_exist<1) {
// En caso de no existir el referer damos un mensaje de error
echo "Error: The referer User Doesn't Exists"; include('footer.php');exit();
}else{
// Si todo parece correcto procedemos con la inserccion
      $sqlz = "SELECT * FROM tb_users WHERE username='$referer'";
      $resultz = mysql_query($sqlz);        
      $myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["referals"];

      $sqlex = "UPDATE tb_users SET referals='$numero' +1 WHERE username='$referer'";
      $resultex = mysql_query($sqlex);
}

}


// Si todo parece correcto procedemos con la inserccion

$joindate=time();

$query = "INSERT INTO tb_users (username, password, ip, email, pemail, referer, country, joindate) VALUES('$username','$password','$laip','$email','$pemail','$referer','$country','$joindate')";
mysql_query($query) or die(mysql_error());

echo "You have been registered correctly <b>$username</b>. Now you can <a href=\"login.php\">login</a>.";


}
}
}
}
}
}

// En caso de no haber sido enviado los datos mostramos el formulario

}else{

?>
<div align="center"><div id="form">

<form action="register.php" method="POST">
<fieldset><legend>&nbsp;All Fields Are Required&nbsp;</legend>

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Username</label></p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='25' name='username' autocomplete="off" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Password</label></p></td>
	<td width="250" align="left"><input type="password" size="25" maxlength="15" name="password" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Confirm Pass</label></p></td>
	<td width="250" align="left"><input type="password" size="25" maxlength="15" name="cpassword" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Email Address</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="email" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Confirm Email</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="cemail" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>PayPal E-mail</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="pemail" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Country</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="country" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Referrer</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="15" name="referer" value="<? echo limpiar($_GET["r"]); ?>" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Terms of Service</label></p></td>
	<td width="250" align="left"><textarea rows="7" cols="25" readonly>
Please read the following rules and terms of the <? include('sitename.php'); ?> service very carefully before joining. We've tried to keep them as short and simple as possible so they would be easy to understand and follow.

1)	Sending unsolicited mail to people, asking them to join <? include('sitename.php'); ?> without any prior contact with you is not only against our policy, but it is also illegal. We have ZERO tolerance against spamming and if we receive just ONE SINGLE complaint against you for spamming, we first verify that the spam incident did occur and then we delete all current funds in your account. If you are reported as spamming for a second time, we will verify the second incident and then take the necessary steps for terminating your account.

2)	You may only have one account. Do not attempt to create more than one account or all of your accounts will be terminated. You should never need another account. If you have forgotten your user information all you need to simply do is request for it to be e-mailed to you.

3)	You may refer other people in your household but only ONE member PER computer.

4)	We have the right to suspend or terminate your account at any time, for any reason and without warning or notice. If we decide to give a notice, we will notify you by e-mail. If you are caught cheating in any way, your account will be deleted without notice and your e-mail will be kept to be posted on a future "wall of shame".

5)	All payments are made via PayPal and no other payment method is being used at this time. You must manually request for payment to be processed and it will be issued within 3 business days. You must accumulate at least $10 before payment will be issued. 

6)	You must have a valid e-mail address and valid PayPal address to register with our program. All e-mail addresses are verified and the system will not let you join without validating at least your e-mail address first. A verification e-mail is sent to you upon registration.

7)	Our current pay rate is $0.01 for each website you visit and $0.01 for each website your direct referrals visit.

8)	You can refer an unlimited amount of people to join the program but you will only earn referral income those that you DIRECTLY refer. 

9)	Advertising fees are to be paid via PayPal only. PayPal accepts all major credit cards, bank transfers and PayPal funds.

10)	By joining <? include('sitename.php'); ?>, you agree that you shall be fully responsible for any filing of taxes that is required by your governmental authorities. Because of our worldwide, international status - we will not do this for you.

11)	You are not an employee of <? include('sitename.php'); ?> and you are not an independent contractor for <? include('sitename.php'); ?>. We simply create a middle-man connection from the advertiser to the consumer. You or <? include('sitename.php'); ?> has the right to terminate this relationship at any time.

12)	We have the right to change our terms of service at anytime without prior consent or notice. Latter notices will be posted via the <? include('sitename.php'); ?> stats area or e-mailed to you.

					</textarea></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Security code:</label></p></td>
	<td width="250" align="left"><input type="text" size="5" maxlength="5" name="code" autocomplete="off" class="securitycode" value="" tabindex="1" /></td>
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
?>






<? include('footer.php'); ?>
