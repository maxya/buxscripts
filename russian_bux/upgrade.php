<? include('header.php'); ?>

<h3>����� ������� ��������</h3>


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

echo "Error: �� ��� ������ �������."; include('footer.php');
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

��� ����� ������! ��� �� �����, ������, ��� �� �������, �� ������ �������� $<?

echo $rowe["price"];

echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$rowe[price]&Desc=�����.�������.��������.��.$row[username]&BringToFront=Y'>��������</a>";

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
<legend>&nbsp;����� ������� �������� &nbsp;</legend>


<p>&nbsp;&nbsp;- <b>������ ����� +100%</b> ��������� �� ���������.
</p>
<p>&nbsp;&nbsp;- <b>5</b> ���������� ���������.
</p>
<p>&nbsp;&nbsp;- <b>+100%</b> � ����� ������.
</p>
<p>&nbsp;&nbsp;- <b>������������ ������� </b> - ���� ������� ��������������� ��� ������� � ������� 2 �����.
</p>
<br>
<p>&nbsp;&nbsp;������ ������� ������� ��   <b>$ <?echo $rowe["price"] ?></b> ��  <b>2 ������</b></p>

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
<p><input type="submit" value="������" class="submit" tabindex="4" /></p>

</form>
</fieldset>
</div></div>


<?

}
?>






<? include('footer.php'); ?>
