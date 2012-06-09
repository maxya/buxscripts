<?
    if (isset($_POST["number"])) {


$number=$_POST["number"];
$refnum=$_POST["refnum"];



$tablea = mysql_query("SELECT * FROM tb_buyref where id='1' and refnum='$refnum'"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registreo = mysql_fetch_array($tablea)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


$new=$registreo["sets"] + $_POST["number"];

    //Todo parece correcto procedemos con la inserccion
    $query = "UPDATE tb_buyref SET sets='$new', id='1' where customer='admin' and refnum='$refnum'";
    mysql_query($query) or die(mysql_error());

echo "<font color=\"green\"><b>Включенное в базе данных.</b></font><br><br>";

}

}
?>

Пользователи без рефералов: <b><?
$checkpemail = mysql_query("SELECT * FROM tb_users WHERE referer=''");
$pemail_exist = mysql_num_rows($checkpemail);

echo $pemail_exist;
?></b><br>

<form method="post" action="index.php?op=5">
Сколько тарифных планов


<select name="refnum">

<?

$tablaa = mysql_query("SELECT * FROM tb_buyref where id='1' ORDER BY id ASC"); // selecciono todos los registros de la tabla ads categories, ordenado por id

while ($registroa = mysql_fetch_array($tablaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo "

<option value=\"".$registroa["refnum"] ."\">". $registroa["refnum"] ." Рефералы </option>

";



}
?>

</select>


Рефералов в продаже: <input type="text" size="3" name="number">
<br>
<input type="submit" class="button" value="сохранить">
</form>
