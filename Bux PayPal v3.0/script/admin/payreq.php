<b>Payments requests</b>


<?
if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];

if ($option=="paid")
{


$username=$_POST["username"];



$tablae = mysql_query("SELECT * FROM tb_users where username='$username'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$lolze=$registroe["money"];
$lolza=$_POST["money"];

$moneye= $lolze - $lolza;

$lolzea=$registroe["paid"];
$moneyere= $lolzea + $lolza;

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET money='$moneye', paid='$moneyere' where username='$username'";
    mysql_query($query) or die(mysql_error());

$eltiempo=time();
$lafecha=date("d M Y H:i",$eltiempo);

    //Todo parece correcto procedemos con la inserccion
    $query = "INSERT INTO tb_history (user, date, amount, method, status) VALUES('$username','$lafecha','$lolza','PayPal','Payment Sent')";
    mysql_query($query) or die(mysql_error());

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_payme WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());


echo "<font color=\"green\"><b>User stats has been updated.</b></font><br><br>";

}

}

}

?>

When you have made the payment via <a href="http://www.paypal.com" target="_blank">paypal</a> push the buttom "Paid".
<br><br>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>E-mail</th>
<th>Paypal email</th>
<th>Amount to pay</th>
<th>Ip</th>
<th></th>
</tr>

<?

$tabla = mysql_query("SELECT * FROM tb_payme ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["email"] ."</td>
<td>". $registro["pemail"] ."</td>
<td>". $registro["money"] ."</td>
<td>". $registro["ip"] ."</td>";

?>

<td>
<form method="post" action="index.php?op=4&id=<?= $registro["id"] ?>&option=paid">
<input type="hidden" name="money" value="<?= $registro["money"] ?>">
<input type="hidden" name="username" value="<?= $registro["username"] ?>">
<input type="submit" value="Paid" class="button">
</form>
</td>
</tr>

<?



} // fin del bucle de ordenes



?>
</table>