<tr>
<td bgcolor="<?=$highlight?>">


<?
require('config.php');
$sqle = "SELECT * FROM tb_ads WHERE user='$last' and ident='$id'";
$resulte = mysql_query($sqle);        
$myrow = mysql_fetch_array($resulte);
mysql_close($con);


$time=$myrow['visitime'];

$crok1 = date(time());
$crok2 = date($time + (24 * 60 * 60));



if($crok1 >= $crok2)

{ 

?><?=$bold?><a href="view.php?ad=<?=$id?>" target="_blank"><?=$description?></a><?=$boldc?><?



 } else { ?><del><?=$description?><del><? }


?>


</td>
<tD bgcolor="<?=$highlight?>">
<?=$members?> 	 	

</td>
<td bgcolor="<?=$highlight?>">

<?=$outside?>

</td>
<td bgcolor="<?=$highlight?>">

<?=$total?>

</td>
</tr>

