<b>������ ������ </b>
<br><br>


<?
if ($_POST){

$tabla5 = mysql_query("SELECT * FROM tb_ads where tipo='ads' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while ($registro5 = mysql_fetch_array($tabla5)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

$igual=$registro5["plan"];

//Todo parece correcto procedemos con la inserccion
$queryz9 = "DELETE FROM tb_ads WHERE tipo='ads' and members='$igual'";
mysql_query($queryz9) or die(mysql_error());
}

echo "<b>�������.</b><br><br>";

}
?>
��� ������ �������� ������, ������� ��������� �����. ����������� ��� ������.
<br><br>
<form method="post" action="index.php?op=13">
<input type="hidden" name="clean" value="clean">
<input type="submit" Value="��������" class="button">
</form>





</table>
