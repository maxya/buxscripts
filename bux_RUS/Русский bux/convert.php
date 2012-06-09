<? 
session_start();
?>
<? include('header.php'); ?>



<h3>Конвертировать в рекламу/выплату</h3>

<br>
<div align="center"><a href="convert.php?convert=ads"><b>Конвертировать в рекламу</b></a><br>
Рекламируйте на <? include('sitename.php'); ?>
<br><br>
<a href="convert.php?convert=cash"><b>Заказать выплату</b></a><br>
Получить наличными через WebMoney. Вы должны заработать по крайней мере $<?
require('config.php'); 
$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["price"]; ?>.</div>
<br><br>
<?

if ($_GET["convert"]=="cash")
{

$user=uc($_COOKIE["usNick"]);

	require('config.php'); 
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

$root=$row["money"];




$sqle = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
$price=$rowe["price"]; 

if ($root<$price){

echo "<center><b>На вашем счету только $".$row["money"]." Вы должны иметь $".$price." для заказа выплат.</b></center>";

}else{

echo "<center><b>После того, как Вы попросите об оплате, ваш счет будет проверен, чтобы убедиться что вы не нарушали правила.</b></center>";

$username=$row["username"];

	require('config.php'); 
$checkuser = mysql_query("SELECT username FROM tb_payme WHERE username='$username'");
$username_exist = mysql_num_rows($checkuser);
mysql_close($con);
if ($username_exist>0) {

echo "<br><center><b>Ваша заказ в обработке.Обрабатка занимает: 1-3 рабочих дня.</b></center>";

}else{

$password=$row["password"];
$email=$row["email"];
$pemail=$row["pemail"];
$country=$row["country"];
$money=$row["money"];
$laip=getRealIP();

	require('config.php'); 
$query = "INSERT INTO `tb_payme` (username, pasword, email, pemail, country, money, ip) VALUES('$username','$password','$email','$pemail','$country','$money','$laip')";
mysql_query($query) or die(mysql_error());
mysql_close($con);
}
}
}



if ($_GET["convert"]=="ads")
{

$user=uc($_COOKIE["usNick"]);

	require('config.php'); 
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

$root=$row["money"];

$sqle = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
$pricee=$rowe["price"]; 

if ($root<$pricee){
echo "<center><b>На вашем счету только $".$row["money"]." Вы должны иметь $".$pricee." для заказа рекламы.</b></center>";
}else{

echo "<center><b>После того, как Вы попросите об оплате рекламы, ваш счет будет проверен, чтобы убедиться что вы не нарушали правила.</b></center>";

$email=$row["email"];

	require('config.php'); 
$checkuser = mysql_query("SELECT pemail FROM tb_advertisers WHERE pemail='$email'");
$username_exist = mysql_num_rows($checkuser);
mysql_close($con);
if ($username_exist>0) {

echo "<br><center><b>Ваша заказ в обработке.Обрабатка занимает: 1-3 рабочих дня.</b></center>";

}else{



if (isset($_POST["url"])) {
  
require('config.php');


if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "SECURITY CODE ERROR... "; exit();
}



$url=limpiar($_POST["url"]);
$description=limpiar($_POST["description"]);

if ($url==""){echo "Error"; exit();}
if ($description==""){echo "Error"; exit();}

$laip = getRealIP();

$user=$_COOKIE["usNick"];

	require('config.php'); 
$sqlu = "SELECT * FROM tb_users WHERE username='$user'";
$resultu = mysql_query($sqlu);        
$rowu = mysql_fetch_array($resultu);

$money=$rowu["money"];


$query = "INSERT INTO tb_advertisers (pemail, plan, url, description, ip, tipo, money) VALUES('$user','1000','$url','$description','$laip','convert','$money')";
mysql_query($query) or die(mysql_error());
mysql_close($con);
echo "<br><center><b>Ваша заказ в обработке.Обрабатка занимает: 1-3 рабочих дня.</b></center>";

}else{


?>
<br><br>
Пожалуйста заполните форму ниже

<div align="center"><div id="form">
<fieldset><legend>&nbsp;Конвертация в рекламу&nbsp;</legend>
<form method="post" action="convert.php?convert=ads">


<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Текст ссылки</label></p></td>
    <td width="250" align="left"><input type="text" name="description" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>URL</label></p></td>
    <td width="250" align="left"><input type="text" name="url" size="25" maxlength="150" autocomplete="off" class="field" value="http://" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Заказ</label></p></td>
    <td width="250" align="left"><?
								require('config.php'); 
								$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result);
								mysql_close($con);?>
								<b>1000 Пользователей $<?= $row["price"] ?></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Введите код </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Convert" class="submit" tabindex="4" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>



<?

}// final post



}


}
}

?>





		<!--footer starts here-->
<? include('footer.php'); ?>
