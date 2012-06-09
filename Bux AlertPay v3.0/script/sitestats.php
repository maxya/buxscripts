<?
include('config.php');
$checkpemail = mysql_query("SELECT id FROM tb_users");
$pemail_exist = mysql_num_rows($checkpemail);


$sqryvar="Select sum(amount) from tb_history";
$iqryvar=mysql_query($sqryvar);
$tot1=mysql_result($iqryvar,0,0);
$totals=$tot1;
if ($totals==''){
	$totalpaid='0.00';
} else{
	$totalpaid=$tot1;
}


$sqryvar="Select sum(visits) from tb_users";
$iqryvar=mysql_query($sqryvar);
$tot1=mysql_result($iqryvar,0,0);
$clickserved=$tot1;
mysql_close($con);
?>

<table width="100%">

<tr>
<td>Per click</td>
<td>$&nbsp;<?php include('config.php');
		$sql = "SELECT * FROM tb_config WHERE item='click' and howmany='1'";
		$result = mysql_query($sql);        
		$row = mysql_fetch_array($result);
		echo $row["price"]; 
		mysql_close($con);?></td>
</tr>
<tr>
<td>Payout</td>
<td>$&nbsp;<?php include('config.php');
				$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
				$result = mysql_query($sql);        
				$row = mysql_fetch_array($result);
				echo $row["price"];
				mysql_close($con);
			?></td>
</tr>
<tr>
<td>Total Users</td>
<td><?php echo $pemail_exist; ?></td>
</tr>
<tr>
<td>Users Online</td>
<td><?php include("onlinesql.php"); ?></td>
</tr>
<tr>
<td>Total Paid</td>
<td>$&nbsp;<?php echo $totalpaid?></td>
</tr>
<tr>
<td>Total Hits</td>
<td><?=$clickserved?></td>
</tr>


</table>

					
