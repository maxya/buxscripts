<b>Добавить Тарифный план</b>
<br><br>

<?
$id=$_POST["id"];
$howmany = $_POST["howmany"];
$price = $_POST["price"];



if($howmany==NULL) {
}else{


// sanitizamos las variables
$price = limpiar($price);




$query = "INSERT INTO tb_refset (id, howmany,price) VALUES('$id', '$howmany', '$price')";
mysql_query($query) or die(mysql_error());

$query2 = "INSERT INTO tb_buyref (id, refnum, customer) VALUES('1', '$howmany', 'admin')";
mysql_query($query2) or die(mysql_error());


echo "Тариф добавлен..";


}




?>

<form action="index.php?op=26" method="POST">
<table><tr><th width="150">№:</th>
<td><input type="text" size="25" maxlength="3" name="id" autocomplete="off"></td></tr>
<tr>
<th width="150"># Рефералов в тарифном плане:</th>
<td><input type="text" size="25" maxlength="5" name="howmany" autocomplete="off"></td></tr>
<tr><th width="150">Стоимость:</th>
<td>$<input type="text" size="25" maxlength="50" name="price" autocomplete="off"></td></tr>
<tr><td></td><td>
<input type="submit" value="добавить" class="button"></td></tr></table>

</form>
