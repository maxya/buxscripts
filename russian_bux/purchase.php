<? include('header.php'); ?>




<?
if (isset($_POST["customer"]))
{

$refset=$_POST["refset"];



require('config.php');
$queryx = mysql_query("SELECT sets FROM tb_buyref WHERE id='1' and refnum='$refset'") or die(mysql_error());
$rowx = mysql_fetch_array($queryx);
mysql_close($con);
if ($rowx["sets"]=="0")
{
echo "<font color=\"red\">Sorry there is no sets aviable at now.</font><br><br>";
}else{


// Si todo parece correcto procedemos con la inserccion

$setz=$rowx["sets"] - 1;
require('config.php');
$queryb = "UPDATE tb_buyref SET sets='$setz' WHERE id='1' and refnum='$refset'";
mysql_query($queryb) or die(mysql_error());
mysql_close($con);

$customer=limpiar($_POST["customer"]);
$pemail=limpiar($_POST["pemail"]);
$refset=limpiar($_POST["refset"]);
$precio=$_POST["price"];
$laip = getRealIP();
require('config.php');
//Todo parece correcto procedemos con la inserccion
$queryzz = "INSERT INTO tb_buyref (customer, amount, refset, pemail, ip) VALUES('$customer','1','$refset', '$pemail','$laip')";
mysql_query($queryzz) or die(mysql_error());
mysql_close($con);

?>
<br>
���� ��� ������� �� ������ �������� � ��� �� ����������� ��������� ������, ���������� ������ �� ���� ������� Z160533713113<br>
� ���������� ������� ���� ����� �� ����� � ���� ������� (������� ���������)
<p>��� ����� ������! ��� �� �����, ������, ��� �� ������� ���� �����, �� ������ ��������� <?
        require('config.php');
$sql = "SELECT * FROM tb_refset WHERE howmany='$refset'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
$precio=$row["price"];
$description=$row["howmany"];


echo "$precio <br></p>";
echo "<a href='wmk:payto?Purse=Z160533713113&Amount=$precio&Desc=������.���������.c.��������.$pemail&BringToFront=Y'>��������</a>";

}

}else{
?>

<br><br><p>�� ��� ��� ��� ���������? �� ����� ��� ������ �������� ���������, �������� ���� ������������ �������� �������� �������.
</p>
<p>
�� ������ ���������� ������������� <? include('sitename.php'); ?> �� ������������ �� ����������� ���������.

</p>
<p align="center"><img src="method.gif"></p>
<?

require('config.php');
$sqld = "SELECT * FROM tb_buyref WHERE customer='admin'";
$resultd = mysql_query($sqld);
$rowd = mysql_fetch_array($resultd);
mysql_close($con);
?>

<br>
<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;��������&nbsp;</legend>

<?
require('config.php');
$tablaa = mysql_query("SELECT * FROM tb_buyref where id='1' ORDER BY id DESC"); // selecciono todos los registros de la tabla ads categories, ordenado por id
mysql_close($con);
while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "<p>&nbsp;&nbsp;�������� ����(".$registroa["refnum"] ." ��������� ): <b>".$registroa["sets"] ."</b></p>


";



}
?>
</fieldset>
</div></div>

<br>

<p class="warning">
<b>���������� ����� ������ ���� ������������� ��������� ���������� ���������!<br>
���� � ������� ���� �� �� �������� ������,<br> ���� ������� ������ ����� �������, � ���� ������������!!!
</b>
</p>



<?

$user=uc($_COOKIE["usNick"]);
require('config.php');
$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
mysql_close($con);
?>


<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;�������&nbsp;</legend>

<form method="post" action="purchase.php">

<p>&nbsp;&nbsp;������: <b><?= $row["username"] ?></b><input type="hidden" value="<?= $row["username"] ?>" name="customer"></p>

<p>&nbsp;&nbsp;WMZ ������: <b><?= $row["pemail"] ?></b><input type="hidden" value="<?= $row["pemail"] ?>" name="pemail"></p>
<p>&nbsp;&nbsp;������� <b> 1 ��������� �����</b> ��


<select name="refset" class="combo">


<?
require('config.php');
$tablaa = mysql_query("SELECT * FROM tb_refset ORDER BY id ASC"); // selecciono todos los registros de la tabla ads categories, ordenado por id

while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
mysql_close($con);

echo "

<option value=\"".$registroa["howmany"] ."\">". $registroa["howmany"] ." ���������  - $". $registroa["price"] ." </option>

";



}
$refnum=$registroa["howmany"];
?>



</select></p>


<p><input type="submit" value="������" class="submit" tabindex="4" /></p>
</form>
</fieldset>
</div></div>
<?
}
?>



<? include('footer.php'); ?>
