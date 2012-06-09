<? 
session_start();
?>


<? include('header.php'); ?>

<h3>Contact Your Referrals</h3>
<br>

<?php 
require ('config.php');
$user=$_COOKIE["usNick"];

$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

mysql_close($con);
if ($row['account'] !="premium"){
	echo"
			<p>Only Premium Members Can Send Messages to Referrals</p>
"; 
include ('footer.php');
exit();
}
?>

<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

</script>








<?

if (isset($_POST["sendto"])) {


if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "SECURITY CODE ERROR... "; 
 include('footer.php');

exit();
}
$sendfrom=$_COOKIE["usNick"];
$sendto=limpiar($_POST["sendto"]);
$comments=limpiar($_POST["comments"]);

if ($sendto==""){echo "Error"; exit();}
if ($comments==""){echo "Error"; exit();}

$eltiempo=time();
$lafecha=date("d-m-y H:i",$eltiempo);
require('config.php');
$query = "INSERT INTO tb_messenger (sendfrom, sendto, date, comments) VALUES('$sendfrom','$sendto','$lafecha','$comments')";
mysql_query($query) or die(mysql_error());
mysql_close($con);
echo "<br><br>Your message has ben sent correctly.";

?>
</font>
		<!--footer starts here-->
<? include('footer.php'); ?>
<?
exit();
}
?>

Use the form below to contact you referrals.
<br><br>
<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;All Fields Required&nbsp;</legend>

<form method="POST" action="sendsms.php">


<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><label>Referral Name</label></td>
    <td width="250" align="left"><select name="sendto" class="combo" tabindex="1">
<option value=""></option>



<? 
require('config.php');
$sendfrom=$_COOKIE["usNick"];
$tabla = mysql_query("SELECT * FROM tb_users where referer='$sendfrom' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($row = mysql_fetch_array($tabla)) {

echo "<option value='".$row["username"]."'>".$row["username"]."</option>

";

}
?>

</select></td>
  </tr>
  <tr>
    <td width="150" align="left"><label>Comments</label></td>
	<td width="250" align="left"><textarea name="comments" rows="7" maxlength="200" onkeyup="return ismaxlength(this)" tabindex="2"></textarea></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Security Code</label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Submit" class="submit" tabindex="3" />
	</td>
  </tr>
</table>

</form>
</fieldset>
</div></div>

<? include('footer.php'); ?>