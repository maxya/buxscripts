<? include('header.php'); ?>



<h3>Ваши рефералы</h3>
С каждого реферала вы получаете 60% прибыли (при этом у него ничего не отнимается!)
<br>


<div id="tables">
<table align="center" width="40%" cellspacing="0" cellpadding="0">
<tr>
<th class="top"><b>Имя реферала</b></th>
<th class="top"><b>Кол. визитов</th></tr>
<?
require('config.php');
$lole=$_COOKIE["usNick"];

$tabla = mysql_query("SELECT * FROM tb_users where referer='$lole' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen




echo "<tr><td align='center'>";

echo $row["username"];

echo "</td><td align='center'>";

echo $row["visits"];

echo "</td></tr>";

}

echo "</table>";

?>

</div>




		<!--footer starts here-->
<? include('footer.php'); ?>
