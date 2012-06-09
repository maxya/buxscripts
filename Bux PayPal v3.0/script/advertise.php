<? session_start(); ?>


<? include('header.php'); ?>
        <!-- Pagetitle -->
        <br><h3>Advertise on <? include('sitename.php'); ?></h3>
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
$mensaje = htmlentities(stripslashes(trim($mensaje)));
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
   
      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una dirección ip que no sea del rango privado. En caso de no
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
$url2=limpiarez($_POST["url"]);
$description=limpiarez($_POST["description"]);
$bold=limpiarez($_POST["bold"]);
$highlight=limpiarez($_POST["highlight"]);

if ($pemail==""){echo "Error"; exit();}
if ($plan==""){echo "Error"; exit();}
if ($url2==""){echo "Error"; exit();}
if ($description==""){echo "Error"; exit();}


$laip = getRealIPe();

require ('config.php');
$query = "INSERT INTO tb_advertisers (pemail, plan, url, description, category, ip, bold, highlight) VALUES('$pemail','$plan','$url2','$description','$category','$laip','$bold','$highlight')";
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.





<br>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 1000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="Premium Membership">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 3000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 5000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 10000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>









<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 500 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


















<?
}
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='20000'";
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 20000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 30000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>


<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 50000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>



<?
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

Your order has been submitted! However, before we will approve your ad, you must pay $<?

echo $precio;

?> via PayPal.<br>


<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<? include('paypal.php'); ?>">
<input type="hidden" name="item_name" value="<? include('sitename.php'); ?> - 100000 site Hits">
<input type="hidden" name="amount" value="<?= $precio ?>">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="MX">
<input type="hidden" name="bn" value="PP-BuyNowBF">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but6.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>







































<?
}
?>
</font>

		<!--footer starts here-->
<? include('footer.php'); ?>
<?
exit();
}
?>







- Setting up and displaying your link for <? include('sitename.php'); ?> members to visit is fast and simple.<br>
- We charge $<? include('config.php');
		$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
		$result = mysql_query($sql);        
		$row = mysql_fetch_array($result);

 echo $row["price"]; ?> per <?
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["howmany"];

?> member visits and each visit will last at least 20 seconds.<br>
- Outside visits are unlimited and included within the price.<br>
- We will review your website and will have it active within 24 hours.<br>
- Your hits will be unique. We will only count the first visit from each person that visits your link each day.
<br><br>
<b>PLEASE</b> make sure that your server can support the amount of requests that your site will get. You will have no way of pausing or canceling your ad once it becomes active. <b>So we know which ad you paid for, please provide your PayPal registered e-mail address so we can do a cross-reference.</b>
<br><br>


<div align="center"><div id="form">
<fieldset><legend>&nbsp;Advertise Here&nbsp;</legend>

<form method="post" action="advertise.php">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>PayPal E-mail</label></p></td>
    <td width="250" align="left"><input type="text" name="pemail" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Link's Text</label></p></td>
    <td width="250" align="left"><input type="text" name="description" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Link's URL</label></p></td>
    <td width="250" align="left"><input type="text" name="url" size="25" maxlength="150" autocomplete="off" class="field" value="http://" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Choose plan:</label></p></td>
<td width="250" align="left"><select name="plan" class="combo" tabindex="4" />

<option value="<?
require ('config.php');
$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>


<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>
<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>







<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='20000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>

<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='30000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>

<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='50000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>

<option value="<?

$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='100000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Member visits $<?= $row["price"] ?></option>

</select></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Security Code </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="5" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Submit" class="submit" tabindex="6" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>




		<!--footer starts here-->
<? include('footer.php'); ?>