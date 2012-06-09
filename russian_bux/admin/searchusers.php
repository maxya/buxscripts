<b>Поиск пользователей</b>

<br><br>


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

    echo "<font color=\"green\"><b>пользователь</font> ".$username." <font color=\"green\">отредактирован.</b></font><br><br>";

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

<form method="post" action="index.php?op=29">

Id: <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
Username: <input type="text" name="username" value="<?= $registroe["username"] ?>"><br>
Password: <input type="text" name="password" value="<?= $registroe["password"] ?>"><br>
Referer: <input type="text" name="referer" value="<?= $registroe["referer"] ?>"><br>
E-mail: <input type="text" name="email" value="<?= $registroe["email"] ?>"><br>
Paypal e-mail: <input type="text" name="pemail" value="<?= $registroe["pemail"] ?>"><br>
Country: <input type="text" name="country" value="<?= $registroe["country"] ?>"><br>
Visits: <input type="text" name="vistis" value="<?= $registroe["visits"] ?>"><br>
Referals: <input type="text" name="referals" value="<?= $registroe["referals"] ?>"><br>
Referals visits: <input type="text" name="referalvisits" value="<?= $registroe["referalvisits"] ?>"><br>
Money: $<input type="text" name="money" value="<?= $registroe["money"] ?>"><br>
Group:&nbsp; (<?= $registroe["user_status"] ?>)&nbsp;&nbsp;

<select name="user_status">

					<option value="<?= $registroe["user_status"] ?>"></option>
					<option value="admin">Администратор</option>
					<option value="user">Пользователь</option>
</select>
<br>


Ip: <?= $registroe["ip"] ?><br>
Join date: <?= $registroe["joindate"] ?><br>
Last log date: <?= $registroe["lastlogdate"] ?><br>
Last ip log: <?= $registroe["lastiplog"] ?><br>



<input type="submit" value="сохранить" class="button">

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

    echo "<font color=\"#cc0000\"><b>Ползователь удален</b></font><br><br>";
}

}

?>


<br>



<?

$search=$_POST["search"];
$metode=$_POST["metode"];

if($_POST['search']){
    $resp = mysql_query("select * from tb_users where $metode LIKE '%$search%'") or die (mysql_error());
    if(mysql_num_rows($resp) == "0") {
     echo "The search did not yield any result .";
    } else {
            echo "<center><strong>SEARCH RESULTS</strong></center><br>";

			?>
			
			<table>
<tr>
<th>Id</th>
<th>Имя</th>
<th>Ip</th>
<th>E-mail</th>
<th>Referer</th>
<th>Посещений</th>
<th>Денеги</th>
<th></th>
<th></th>
</tr>
<?

                   while($cat = mysql_fetch_array($resp)) {
                  
		   
echo "
<tr>
<td>". $cat["id"] ."</td>
<td>". $cat["username"] ."</td>
<td>". $cat["ip"] ."</td>
<td>". $cat["email"] ."</td>
<td>". $cat["referer"] ."</td>
<td>". $cat["visits"] ."</td>
<td>". $cat["money"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=29&id=<?= $cat["id"] ?>&option=edit">
<input type="submit" value="редактировать" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=29&id=<?= $cat["id"] ?>&option=delete">
<input type="submit" value="удалить" class="button">
</form>
</td>
</tr>



<?


                   }

				   ?>
</table>  
	
<?
}
}else{

	?>

<form action="" method="POST" name='form1'>

<table><tr>
<th width="150">Ведите имя:</th>
<td><input type="text" size="25" maxlength="100" name="search" autocomplete="off" value="" id="search"></td></tr>
<tr>
<th width="150">By:</th>
<td><select name="metode">
					<option value="username">Имя</option>
					<option value="email">E-mail</option>
					<option value="pemail">WMID</option>
					<option value="id">№</option>

					
	</select>
					</td></tr>


<tr><td></td><td>
<input type="submit" value="поиск" class="button" name="Submit"></td></tr></table>

</form>
<br><br>





<?
}
?>
