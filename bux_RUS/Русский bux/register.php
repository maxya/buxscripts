<? 
session_start();
?>
<? include('header.php'); ?>



<?

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

?>

<b><a href="#" onClick="window.location.reload()">cтраница перенаправления.....</a></b>

<? include('footer.php'); ?>


<? exit(); } ?>



<?



// incluimos archivos necesarios

require('config.php');
//require('admin/funciones.php');

if (isset($_POST["username"])) {
 
if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 

echo "<br><br>ОШИБКА ВВОДА КОДА... ";

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
echo "Заплнети все поля";
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


// їCoinciden las contraseсas?
if($password!=$cpassword) {
echo "Passwords Do Not Match";
}else{


// їCoinciden los emails?
if($email!=$cemail) {
echo "Emails Do not Match";
}else{


// Comprobamos que sea un email valido
ValidaMail($email);


// Comprobamos que sea un email valido
ValidaWMID($pemail);





// Comprobamos que no se haya creado otra cuenta desde la misma ip

$laip = getRealIP();


if($laip!="127.0.0.1")
{

    $checkip = mysql_query("SELECT ip FROM tb_users WHERE ip='$laip'");
    $ip_exist = mysql_num_rows($checkip);

}

if ($ip_exist>0) {
echo "Error: Вы создали счет.";
}else{


// Comprobamos que el nombre de usuario, email y el email de paypal no existan

$checkuser = mysql_query("SELECT username FROM tb_users WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);

$checkemail = mysql_query("SELECT email FROM tb_users WHERE email='$email'");
$email_exist = mysql_num_rows($checkemail);

$checkpemail = mysql_query("SELECT pemail FROM tb_users WHERE pemail='$pemail'");
$pemail_exist = mysql_num_rows($checkpemail);

if ($email_exist>0|$username_exist>0) {
echo "Такой логин или email есть в системе.";
}else{

if ($pemail_exist>0) {
echo "Ваш кошелек используется.";
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
echo "Error: такого реферала нет"; include('footer.php');exit();
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

echo "Поздравляем теперь вы <b>$username</b>. зарегистрированы. Пройдите по ссылке чтобы <a href=\"login.php\">войти</a> в ваш аккуант";


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
<fieldset><legend>&nbsp;<big>Регистрация нового пользователя</big>&nbsp;</legend>
Поля отмеченный <font color="#FF0000">*</font> обязательны для заполнения!!!
<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>Имя:</label></p></td>
    <td width="250" align="left"><input type='text' size='15' maxlength='25' name='username' autocomplete="off" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>Пароль:</label></p></td>
	<td width="250" align="left"><input type="password" size="25" maxlength="15" name="password" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>Пароль еще раз:</label></p></td>
	<td width="250" align="left"><input type="password" size="25" maxlength="15" name="cpassword" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>E-mail:</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="email" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>E-mail еще раз: </label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="cemail" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>WMZ - кошелек</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="pemail" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>Страна:</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="100" name="country" autocomplete="off" class="field" value="Russia" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Реферал:</label></p></td>
	<td width="250" align="left"><input type="text" size="25" maxlength="15" name="referer" value="<? echo limpiar($_GET["r"]); ?>" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Соглашение нового пользователя:</label></p></td>
	<td width="250" align="left"><textarea rows="7" cols="25" readonly>
Пожалуйста, прочтите правила <? include('sitename.php'); ?>.

1)Запрещен спам с просьбами присоединиться к <? include('sitename.php'); ?>. Если мы получим предупреждение о Спаме Ваш счёт будет аннулирован, а учётная запись удалена.

2)Запрещено иметь больше одной учётной записи в системе. Если вы забыли пароль воспользуйтесь формой востановления пароля или обратитесь к администрации.

3)Мы имеем право закрыть или удалить Вашу учётную запись в любое время по любой причине, не предупреждая Вас.

4)Мы работаем с системой оплаты WebMoney. Все оплаты рекламы и выплаты производятся в ручном режиме.

5)Вы должны ввести правильный E-mail адрес и Z кошелёк в системе WebMoney. Мы не отвечаем за ошибочно введенные данные.

6)Текущая цена за клик составляет $0,01 и $0,001 за клик вашего реферала.

7)Присоединяясь к <? include('sitename.php'); ?>, Вы обязаны соблюдать закон Российской Федерации.

8)Вы имеете право в любое время отозвать свою рекламу обратившись к нам,при этом средства вам возвращены не будут.

9)Мы имеем право в любое время, без предупреждения удалить вашу рекламу, если она не соответствует закону РФ, средства возвращены не будут.

10)Мы имеем право изменить это соглашение в любое время без предупреждения.


					</textarea></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label><font color="#FF0000">*</font>Код на картинке:</label></p></td>
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
