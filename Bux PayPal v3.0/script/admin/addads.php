<b>Add New Ads</b>
<br><br>

<?
$id=$_POST["id"];
$user = $_POST["user"];
$tipo = $_POST["tipo"];
$plan = $_POST["plan"];
$url = $_POST["url"];
$description = $_POST["description"];
$category = $_POST["category"];




if($url==NULL) {
}else{


// sanitizamos las variables

$user = limpiar($user);
$tipo = limpiar($tipo);
$plan = limpiar($plan);
$url = limpiar($url);
$description = limpiar($description);
$category = limpiar($category);











$query = "INSERT INTO tb_ads (user, tipo, plan, url, description, category) VALUES( 'admin', 'ads', '1000', '$url', '$description', '$category')";
mysql_query($query) or die(mysql_error());

echo "Ad has been added..";


}




?>

<form action="index.php?op=28" method="POST">

<table><tr>
<th width="150">URL(include http://)</th>
<td><input type="text" size="25" maxlength="100" name="url" autocomplete="off" value="http://"></td>
</tr>
<tr><th width="150">Description:</th>
<td><input type="text" size="25" maxlength="100" name="description" autocomplete="off"></td></tr>
<tr><th width="150">Category:</th>
<td><input type="text" size="25" maxlength="100" name="category" autocomplete="off"></td></tr>

<tr><td></td><td>
<input type="submit" value="Add New Ad" class="button"></td></tr></table>

</form>