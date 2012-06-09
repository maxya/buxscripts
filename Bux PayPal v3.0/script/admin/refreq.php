
<b>Buy sets of referals requests</b>

<?

if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="approve")
{

if (isset($_POST["customer"]))
{

$customer=$_POST["customer"];
$id=$_POST["id"];
$referals=$_POST["refset"];



$checkpemaile = mysql_query("SELECT * FROM tb_users WHERE referer=''");
$pemail_existe = mysql_num_rows($checkpemaile);

if ($pemail_existe<$referals)
{

echo "Error. There are not ". $referals ." users without referer.<br><br>";

}else{


$tablea = mysql_query("SELECT * FROM tb_users where referer='' and username != '$customer' limit $referals"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registreo = mysql_fetch_array($tablea)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$lolsr=$registreo["username"];

$sqlexe = "UPDATE tb_users SET referer='$customer' WHERE username='$lolsr'";
$resultexe = mysql_query($sqlexe);

}


$sqlz = "SELECT * FROM tb_users WHERE username='$customer'";
$resultz = mysql_query($sqlz);        
$myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["referals"] + $referals;

$sqlex = "UPDATE tb_users SET referals='$numero' WHERE username='$customer'";
$resultex = mysql_query($sqlex);

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_buyref WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

}

}

}

if ($_GET["option"]=="deny")
{
    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_buyref WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());
}

}

?>
Users without referer: <b><?
$checkpemail = mysql_query("SELECT * FROM tb_users WHERE referer=''");
$pemail_exist = mysql_num_rows($checkpemail);

echo $pemail_exist;
?></b>
<br><br>
When you push "Approve" it automatically put the referals asigned to the customer.
<br><br>
<table>
<tr>
<th>Customer</th>
<th>Paypal Email</th>
<th>Sets</th>
<th></th>
<th></th>
</tr>

<?

$tabla = mysql_query("SELECT * FROM tb_buyref where id!='1' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["customer"] ."</td>
<td>". $registro["pemail"] ."</td>

<td>1 Set of ". $registro["refset"] ." referals</td>
	";
?>
<td><form method="post" action="index.php?op=6&id=<?= $registro["id"] ?>&option=approve">
<input type="hidden" name="customer" value="<?= $registro["customer"] ?>">
<input type="hidden" name="id" value="<?= $registro["id"] ?>">
<input type="hidden" name="refset" value="<?= $registro["refset"] ?>">
<input type="submit" value="Approve" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=6&id=<?= $registro["id"] ?>&option=deny">
<input type="submit" value="Deny" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>