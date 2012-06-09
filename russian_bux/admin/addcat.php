<b>Добавление категорий</b>
<br><br>

<?

$catname = $_POST["catname"];
$id=$_POST["id"];


if($catname==NULL) {
}else{


// sanitizamos las variables

$catname = limpiar($catname);

$catname=limitatexto($catname,50);










$query = "INSERT INTO tb_ads_categories (id, catname) VALUES('$id', '$catname')";
mysql_query($query) or die(mysql_error());

echo "Категория добавлена..";


}




?>

<form action="index.php?op=24" method="POST">

<table><tr><th width="150">Категория №:</th>
<td><input type="text" size="25" maxlength="3" name="id" autocomplete="off"></td></tr>
<tr><th width="150">Название:</th>
<td><input type="text" size="25" maxlength="50" name="catname" autocomplete="off"></td></tr>
<tr><td></td><td>
<input type="submit" value="добавить" class="button"></td></tr></table>

</form>
