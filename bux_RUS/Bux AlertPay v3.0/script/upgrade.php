<? include('header.php'); ?>

<h3>Premium Membership</h3>


<?

if(isset($_POST["user"]))
{




$user=limpiar($_POST["user"]);
$pemail=limpiar($_POST["pemail"]);
$email=limpiar($_POST["email"]);

$laip = getRealIP();


require('config.php');
$sqle = "SELECT * FROM tb_upgrade WHERE username='$user'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
if ($rowe["status"]=="upgraded")
{

echo "Error: Users cant upgrade twice."; include('footer.php');
exit();

}

require('config.php');
$query = "INSERT INTO tb_upgrade (username, pemail, email, ip) VALUES('$user','$pemail','$email','$laip')";
mysql_query($query) or die(mysql_error());


$sqle = "SELECT * FROM tb_config WHERE item='upgrade' and howmany='1'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
?>

Your order has been submitted! However, before we will approve your ad, you must pay $<?

$precio=$rowe["price"];
echo $precio;

?> via AlertPay. <a href="members.php"><b>Go back</b></a>.

<!-- ALERTPAY GATEWAY -->

<form method="post" action="https://www.alertpay.com/PayProcess.aspx" >  
<input type="hidden" name="ap_purchasetype" value="service"/>  
<input type="hidden" name="ap_merchant" value="<? include('alertpay.php'); ?>"/>  
<input type="hidden" name="ap_itemname" value="<? include('sitename.php');?> - Premium Membership"/>  
<input type="hidden" name="ap_currency" value="USD"/>  
<input type="hidden" name="ap_returnurl" value="<?= $url ?>"/>  
<input type="hidden" name="ap_itemcode" value="01"/>  
<input type="hidden" name="ap_quantity" value="1"/>  
<input type="hidden" name="ap_description" value="Premium Membership"/>  
<input type="hidden" name="ap_amount" value="<?= $precio ?>"/>  
<input type="hidden" name="ap_cancelurl" value="<?= $url ?>"/>  
<input type="image" name="ap_image" src="https://www.alertpay.com/Images/BuyNow/big_pay_01.gif"/> 
</form>
<?

}else{
require('config.php');
	$sqle = "SELECT * FROM tb_config WHERE item='upgrade' and howmany='1'";
$resulte = mysql_query($sqle);        
$rowe = mysql_fetch_array($resulte);
mysql_close($con);
?>

<br>
<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;Upgrade Membership&nbsp;</legend>


<p>&nbsp;&nbsp;- <b>+15%</b> first level referrals earnings more.</p>
<p>&nbsp;&nbsp;- <b>5</b> free referrals to your downline.</p>
<p>&nbsp;&nbsp;- <b>Priority Payments</b> - get paid in less than 2 hours.</p>
<br>
<p>&nbsp;&nbsp;Premium Membership is <b>$ <?echo $rowe["price"] ?></b> for a <b>1 year</b> membership.</p>

<div align="center"><img src="method.gif"></div>
<?

$elus=$_COOKIE["usNick"];
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$elus'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
$dep1=$row["username"];
$dep2=$row["pemail"];
$dep3=$row["email"];
$dep4=$row["lastiplog"];

?>
<form method="post" action="upgrade.php">
<input type="hidden" name="user" value="<?= $dep1 ?>">
<input type="hidden" name="pemail" value="<?= $dep2 ?>">
<input type="hidden" name="email" value="<?= $dep3 ?>">
<input type="hidden" name="ip" value="<?= $dep4 ?>"><br>
<p><input type="submit" value="Upgrade" class="submit" tabindex="4" /></p>

</form>
</fieldset>
</div></div>


<?

}
?>






<? include('footer.php'); ?>