<b>Edit Users</b>

<?


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$referer=$_POST["referer"];
$email=$_POST["email"];
$pemail=$_POST["pemail"];
$country=$_POST["country"];
$vistis=$_POST["vistis"];
$referals=$_POST["referals"];
$referalvisits=$_POST["referalvisits"];
$money=$_POST["money"];
$user_status=$_POST["user_status"];


    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET username='$username', password='$password', referer='$referer', email='$email', pemail='$pemail', country='$country', visits='$vistis', referals='$referals', referalvisits='$referalvisits', money='$money', user_status='$user_status' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>User edited.</b></font><br><br>";

}


if (isset($_GET["id"]))
{

$id=$_GET["id"];

if ($_GET["option"]=="edit")
{
?>

<?

$tablae = mysql_query("SELECT * FROM tb_users where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=7">

Id: <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
Username: <input type="text" name="username" value="<?= $registroe["username"] ?>"><br>
Password: <input type="text" name="password" value="<?= $registroe["password"] ?>"><br>
Referer: <input type="text" name="referer" value="<?= $registroe["referer"] ?>"><br>
E-mail: <input type="text" name="email" value="<?= $registroe["email"] ?>"><br>
AlertPay e-mail: <input type="text" name="pemail" value="<?= $registroe["pemail"] ?>"><br>
Country: <input type="text" name="country" value="<?= $registroe["country"] ?>"><br>
Visits: <input type="text" name="vistis" value="<?= $registroe["visits"] ?>"><br>
Referals: <input type="text" name="referals" value="<?= $registroe["referals"] ?>"><br>
Referals visits: <input type="text" name="referalvisits" value="<?= $registroe["referalvisits"] ?>"><br>
Money: $<input type="text" name="money" value="<?= $registroe["money"] ?>"><br>
Group:&nbsp; (<?= $registroe["user_status"] ?>)&nbsp;&nbsp;

<select name="user_status">

					<option value="<?= $registroe["user_status"] ?>"></option>
					<option value="admin">Admin</option>
					<option value="user">User</option>
</select>
<br>


Ip: <?= $registroe["ip"] ?><br>
Join date: <?= $registroe["joindate"] ?><br>
Last log date: <?= $registroe["lastlogdate"] ?><br>
Last ip log: <?= $registroe["lastiplog"] ?><br>



<input type="submit" value="Save" class="button">

</form>

<?

}
?>


<?
}

if ($_GET["option"]=="delete")
{

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_users WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>User deleted.</b></font><br><br>";
}

}

?>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Ip</th>
<th>E-mail</th>
<th>Referer</th>
<th>Visits</th>
<th>Money</th>
<th></th>
<th></th>
</tr>
<?

//Limito la busqueda
$TAMANO_PAGINA = 50;

//examino la página a mostrar y el inicio del registro a mostrar
$pagina = limpiar($_GET["pagina"]);
if (!$pagina) {
    $inicio = 0;
    $pagina=1;
}
else {
    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
} 

$tabla = mysql_query("SELECT * FROM tb_users ORDER BY id ASC limit $inicio,$TAMANO_PAGINA"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["ip"] ."</td>
<td>". $registro["email"] ."</td>
<td>". $registro["referer"] ."</td>
<td>". $registro["visits"] ."</td>
<td>". $registro["money"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=7&id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=7&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>

<?
$uno = limpiar($_GET["pagina"]);

if (empty($uno)){ 
$uno = 1;
$mos = $uno + 1;
echo "<a href='index.php?op=7&pagina=$mos'><font face=\"verdana\" style=\"font-size:11px;\" color=\"#000000\"><b>Next page</b></font></a> ";
} else {

$mos = $uno + 1;

for ($z=$mos;$z<=$mos;$z++){
echo "<a href='index.php?op=7&pagina=$z'><font face=\"verdana\" style=\"font-size:11px;\" color=\"#000000\"><b>Next page</b></font></a> ";

}



}
?>