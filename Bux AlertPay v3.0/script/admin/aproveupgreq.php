<b>Approve or deny Upgrades requests</b>


<?

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];
$username=$_POST["username"];

$laip = getRealIP();

$fechainicia=time();

if ($option=="approve"){


    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_users SET account='premium' where username='$username'";
    mysql_query($query) or die(mysql_error());





$referals="5";

$checkpemaile = mysql_query("SELECT * FROM tb_users WHERE referer=''");
$pemail_existe = mysql_num_rows($checkpemaile);

if ($pemail_existe<5)
{

echo "Error. There are not 5 users withour referer.<br><br>"; exit();

}else{

$tablea = mysql_query("SELECT * FROM tb_users where referer='' and username != '$username' limit 5"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registreo = mysql_fetch_array($tablea)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$lolsr=$registreo["username"];

$sqlexe = "UPDATE tb_users SET referer='$username' WHERE username='$lolsr'";
$resultexe = mysql_query($sqlexe);

}

$sqlz = "SELECT * FROM tb_users WHERE username='$username'";
$resultz = mysql_query($sqlz);        
$myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["referals"] + $referals;

$sqlex = "UPDATE tb_users SET referals='$numero' WHERE username='$username'";
$resultex = mysql_query($sqlex);

}


$sqlex = "UPDATE tb_upgrade SET status='upgraded', date='$fechainicia', ip='$laip' WHERE username='$username'";
$resultex = mysql_query($sqlex);


    echo "<font color=\"green\"><b>Avertise request has been approved.</b></font><br><br>";
}

if ($option=="deny"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_upgrade WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>Avertise request has been deny.</b></font><br><br>";
}


}
?>



<table>
<tr>
<th>Id</th>
<th>User</th>
<th>AlertPay E-mail</th>
<th>Email</th>
<th></th>
<th></th>
</tr>
<?

$tabla = mysql_query("SELECT * FROM tb_upgrade ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["username"] ."</td>
<td>". $registro["pemail"] ."</td>
<td>". $registro["email"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=11&id=<?= $registro["id"] ?>&option=approve">
<input type="hidden" name="username" value="<?= $registro["username"] ?>">
<input type="submit" value="approve" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=11&id=<?= $registro["id"] ?>&option=deny">
<input type="submit" value="deny" class="button">
</form>

</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>
