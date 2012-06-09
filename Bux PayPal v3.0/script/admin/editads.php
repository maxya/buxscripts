<b>Edit Ads</b>


<?


if (isset($_POST["id"]))
{

$id=$_POST["id"];
$pname=$_POST["pname"];
$pemail=$_POST["pemail"];
$plan=$_POST["plan"];
$url=$_POST["url"];
$description=$_POST["description"];
$category=$_POST["category"];
$bold=$_POST["bold"];
$highlight=$_POST["highlight"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_ads SET bold='$bold', highlight='$highlight', paypalname='$pname', paypalemail='$pemail', plan='$plan', url='$url', description='$description', category='$category' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>Ads edited.</b></font><br><br>";


}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

?>


<?

$tablae = mysql_query("SELECT * FROM tb_ads where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=2">

Id: <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
Paypal name: <input type="text" name="pname" value="<?= $registroe["paypalname"] ?>"><br>
Paypal email: <input type="text" name="pemail" value="<?= $registroe["paypalemail"] ?>"><br>
Plan(number of visits): <input type="text" name="plan" value="<?= $registroe["plan"] ?>"><br>
URL: <input type="text" name="url" value="<?= $registroe["url"] ?>"><br>
Description: <input type="text" name="description" value="<?= $registroe["description"] ?>"><br>

Category: [<?= $registroe["category"] ?>]  - 
<select name="category">


<?

$tablaa = mysql_query("SELECT * FROM tb_ads_categories ORDER BY id ASC"); // selecciono todos los registros de la tabla ads categories, ordenado por id

while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "

<option value=\"".$registroa["id"] ."\">[". $registroa["id"] ."] - ". $registroa["catname"] ."</option>

";
}
?>



</select><br>

Bold: <input type="text" name="bold" value="<?= $registroe["bold"] ?>"><br>
Highlight: <input type="text" name="highlight" value="<?= $registroe["highlight"] ?>"><br>
<br>

<input type="submit" value="Save" class="button">

</form>
<br><br>
<?
}
?>

<?

}

if ($option=="delete"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_ads WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>Avertise has been deleted.</b></font><br><br>";
}


}
?>

<table cellspacing="0" cellpadding="0">
<tr>
<th>Id</th>
<th>URL</th>
<th>Description</th>
<th>Category</th>
<th>Visits</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>
<?

$tabla = mysql_query("SELECT * FROM tb_ads where tipo='ads' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td ><a href=\"". $registro["url"] ."\" target=\"_blank\">View</a></td>
<td><a href=\"#\" onmouseover=\"Tip('". $registro["description"] ."')\">Description</a></td>

<td>". $registro["category"] ."</td>


<td>". $registro["plan"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=2&id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=2&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>


