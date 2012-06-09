<b>Добавление - удаление ссылок</b>


<?

if (isset($_GET["id"]))
{

$id=$_GET["id"];
$option=$_GET["option"];
$pemail=$_POST["pemail"];
$plan=$_POST["plan"];
$url=$_POST["url"];
$description=$_POST["description"];
$ip=$_POST["ip"];
$bold=$_POST["bold"];
$highlight=$_POST["highlight"];
$fechainicia=time();

if ($option=="approve"){


    //Todo parece correcto procedemos con la inserccion
    $query = "INSERT INTO tb_ads (fechainicia, paypalemail, plan, url, description, tipo, bold, highlight) VALUES('$fechainicia','$pemail','$plan','$url','$description','ads','$bold','$highlight')";
    mysql_query($query) or die(mysql_error());

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_advertisers WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"green\"><b>Реклама добавлена.</b></font><br><br>";
}

if ($option=="deny"){

    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_advertisers WHERE id='$id'";
    mysql_query($queryz) or die(mysql_error());

    echo "<font color=\"#cc0000\"><b>Реклама удалена.</b></font><br><br>";
}


}
?>



<table>
	<tr>
		<th>№</th>
		<th>WMID</th>
		<th>Визитов</th>
		<th>URL</th>
		<th>Описание</th>
		<th>Жирный шрифт</th>
		<th>Подчеркнутый</th>
		<th>Ip</th>
		<th></th>
		<th></th>
	</tr>
<?

$tabla = mysql_query("SELECT * FROM tb_advertisers where tipo!='convert' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "
<tr>
<td>". $registro["id"] ."</td>
<td>". $registro["pemail"] ."</td>
<td>". $registro["plan"] ."</td>
<td><a href=\"". $registro["url"] ."\" target=\"_blank\">Ссылка</a></td>
<td><a href=\"#\" onmouseover=\"Tip('". $registro["description"] ."')\">Описание</a></td>
<td>". $registro["bold"] ."</td>
<td>". $registro["highlight"] ."</td>
<td>". $registro["ip"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=1&id=<?= $registro["id"] ?>&option=approve">
<input type="hidden" name="pemail" value="<?= $registro["pemail"] ?>">
<input type="hidden" name="plan" value="<?= $registro["plan"] ?>">
<input type="hidden" name="url" value="<?= $registro["url"] ?>">
<input type="hidden" name="description" value="<?= $registro["description"] ?>">
<input type="hidden" name="ip" value="<?= $registro["ip"] ?>">
<input type="hidden" name="bold" value="<?= $registro["bold"] ?>">
<input type="hidden" name="highlight" value="<?= $registro["highlight"] ?>">
<input type="submit" value="добовить" class="button">
</form>
</td><td>
<form method="post" action="index.php?op=1&id=<?= $registro["id"] ?>&option=deny">
<input type="submit" value="удалить" class="button">
</form>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>
