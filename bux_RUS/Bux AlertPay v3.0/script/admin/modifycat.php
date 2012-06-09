<b>Modify Categories</b>
<br><br>






<?
// Insertar Categorias





if (isset($_POST["id"]))
{

$id=$_POST["id"];
$catname=$_POST["catname"];


    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_ads_categories SET  catname='$catname' where id='$id'";
    mysql_query($query) or die(mysql_error());

    echo "<font color=\"green\"><b>Categories edited.</b></font><br><br>";


}

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];


if ($option=="edit"){

?>


<?

$tablae = mysql_query("SELECT * FROM tb_ads_categories where id='$id'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablae)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


?>

<form method="post" action="index.php?op=25">

Id: <input type="hidden" name="id" value="<?= $registroe["id"] ?>"><?= $registroe["id"] ?><br>
Category name: <input type="text" name="catname" value="<?= $registroe["catname"] ?>"><br>
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
    $queryz = "DELETE FROM tb_ads_categories WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>Category has been deleted.</b></font><br><br>";
}

}
?>







<table>
<tr>
<th>Id</th>
<th>Category Name</th>
<th></th>
<th></th>
</tr>
<?

$tabla = mysql_query("SELECT * FROM tb_ads_categories ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["catname"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=25&id=<?= $registro["id"] ?>&option=edit">
<input type="submit" value="Edit" class="button">
</form>
</font>
</td>
<td>
<form method="post" action="index.php?op=25&id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="Delete" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>

