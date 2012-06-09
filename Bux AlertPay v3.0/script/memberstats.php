<? require('config.php');


$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
mysql_close($con);
?>



<div id="navmainlistline">&nbsp;</div>

<fieldset>
<legend>Account Stats:</legend>

<table width="100%">

<tr>
<td>Ads Viewed</td>
<td><? echo $row["visits"]; ?></td>
</tr>
<tr>
<td>Referrals</td>
<td><? echo $row["referals"]; ?></td>
</tr>
<tr>
<td>Referral Visits</td>
<td><? echo $row["referalvisits"]; ?></td>
</tr>
<tr>
<td>Balance</td>
<td>$&nbsp;<? echo $row["money"]; ?></td>
</tr>
<tr>
<td>Total Paid</td>
<td>$&nbsp;<? echo $row["paid"]; ?></td>
</tr>


</table>

</fieldset>