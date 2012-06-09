<? session_start(); ?>


<? include('header.php'); ?>
        <!-- Pagetitle -->
        <br><h3>Реклама на <? include('sitename.php'); ?></h3>
<br>

<?

if (isset($_POST["pemail"])) {

require('config.php');


if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){
echo "SECURITY CODE ERROR... <br>

";

 include('footer.php');
exit();
}

// funcion para sanitizar variables
function limpiarez($mensaje)
{

$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
}


// ip real
function getRealIPe()
{

   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );

      // los proxys van aсadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una direcciуn ip que no sea del rango privado. En caso de no
      // encontrarse ninguna se toma como valor el REMOTE_ADDR

      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

      reset($entries);
      while (list(, $entry) = each($entries))
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./',
                  '/^127\.0\.0\.1/',
                  '/^192\.168\..*/',
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                  '/^10\..*/');

            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   }

   return $client_ip;

}



$pemail=limpiarez($_POST["pemail"]);
$plan=limpiarez($_POST["plan"]);
$url=limpiarez($_POST["url"]);
$description=limpiarez($_POST["description"]);
$bold=limpiarez($_POST["bold"]);
$highlight=limpiarez($_POST["highlight"]);

if ($pemail==""){echo "Error"; exit();}
if ($plan==""){echo "Error"; exit();}
if ($url==""){echo "Error"; exit();}
if ($description==""){echo "Error"; exit();}


$laip = getRealIPe();


$query = "INSERT INTO tb_advertisers (pemail, plan, url, description, category, ip, bold, highlight) VALUES('$pemail','$plan','$url','$description','$category','$laip','$bold','$highlight')";
mysql_query($query) or die(mysql_error());


$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];
$wop1=$row["bold"];
$wop2=$row["highlight"];

if ($plan==$wop){

?>

<?

$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;



echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";



}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='100'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='30000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='50000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='100000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);

$wop=$row["howmany"];

if ($plan==$wop){

?>

<?
$precio=$row["price"];
if ($bold==1){
$precio=$row["price"]+2.00;
}
if ($highlight==1){
$precio=$row["price"]+3.00;
}
if ($bold==1 && $highlight==1){
$precio=$row["price"]+2.00+3.00;
}



?>

Ваш заказ принят! Тем не менее, прежде, чем мы одобрим ваш заказ, Вы должны оплатить $<?

echo $precio;

echo "<br>";

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=Оплата.рекламы.c.WMID.$pemail&BringToFront=Y'>Оплатить через WebMoney</a>
<br><br>В ручном режиме оплатить.<br>
В ручном режиме перевести на WMZ кошелек Z160533713113 в примечании указать &quot; Оплата рекламы c $pemail,$description,$plan визитов.&quot;<br> ";
}
?>
</font>

                <!--footer starts here-->
<? include('footer.php'); ?>
<?
exit();
}
?>







- Эффективная раскрутка с помощью нашего сервиса.<br>
- Мы берем $<? include('config.php');
                $sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
                $result = mysql_query($sql);
                $row = mysql_fetch_array($result);

 echo $row["price"]; ?> за <?
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["howmany"];

?> уникальных просмотров длительностью 20 секунд.<br>
- Добавление ссылки осуществляется после оплаты в течении 1-12 часов<br>
- Все переходы уникальные,мы гарантируем колличество заказанной рекламы и количество переходов на ваш сайт.
<br><br>
<b>Внимание</b> Убедитесь,что ваш сервер примет то количество посетителей, которое вы заказали.

<br><br>


<div align="center"><div id="form">
<fieldset><legend>&nbsp;Форма заказа рекламы&nbsp;</legend>

<form method="post" action="advertise.php">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>WMID</label></p></td>
    <td width="250" align="left"><input type="text" name="pemail" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Текст ссылки:</label></p></td>
    <td width="250" align="left"><input type="text" name="description" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>URL:</label></p></td>
    <td width="250" align="left"><input type="text" name="url" size="25" maxlength="150" autocomplete="off" class="field" value="http://" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Заказ:</label></p></td>
<td width="250" align="left"><select name="plan" class="combo" tabindex="4" />

<option value="<?
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Пользователей $<?= $row["price"] ?></option>


<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Пользователей $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Пользователей $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Пользователей $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Пользователей $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Пользователей $<?= $row["price"] ?></option>



</select></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Введите код: </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="5" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Оплатить" class="submit" tabindex="6" />
        </td>
  </tr>
</table>
</form>
</fieldset>
</div></div>




                <!--footer starts here-->
<? include('footer.php'); ?>
