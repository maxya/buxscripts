<? 
session_start();
?>


<? include('header.php'); ?>
<h3>Контакт с рефералами</h3>
<br>

<?
 

if (isset($_GET["id"]))
{


$id=$_GET["id"];
$to=$_GET["to"];
$option=$_GET["option"];


?>


<?


if ($option=="delete"){
require ('config.php');
    //Todo parece correcto procedemos con la inserccion
    $queryz = "DELETE FROM tb_messenger WHERE id='$id' LIMIT 1";
    mysql_query($queryz) or die(mysql_error());
mysql_close($con);
    echo "<font color=\"#cc0000\"><b>Сообщение удалено.</b></font><br><br>";
}

if ($option=="read"){


    echo "<font color=\"#cc0000\"><b>Сообщение удалено.</b></font><br><br>";
}


}

require ('config.php');
$user=$_COOKIE["usNick"];

$sql = "SELECT * FROM tb_users WHERE username='$user'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

mysql_close($con);
if ($row['account'] =="premium"){
	echo"
			
			<p><a href=\"sendsms.php\">Послать сообщение рефералам</a></p>
"; } else{
	echo"
			
			<p><a href=\"#\"><del>Послать сообщение рефералам</del></a>&nbsp;&nbsp;Только premium могут посылоть сообщения</p>
"; }
?>


<div id="tables">

<table cellspacing="0" cellpadding="0" width="80%" align="center">
<tr>
<th class="top" width="35%">Дата</th>
<th class="top" width="35%">Тема</th>
<th class="top" width="15%">&nbsp;</th>
<th class="top" width="15%">&nbsp;</th>
</tr>
<? require ('config.php');
$lole=$_COOKIE["usNick"];
$tabla = mysql_query("SELECT * FROM tb_messenger where sendto='$lole' ORDER BY id DESC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
mysql_close($con);
while ($registro = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen

if ( $registro["status"] == 'unread'){

echo "
<tr>
<td><font color=red><strong>". $registro["date"] ."</strong></font></td>
<td align='center'><font color=red><strong>". $registro["sendfrom"] ."</strong></font></td>
<td>";
} else{
echo "
<tr>
<td>". $registro["date"] ."</td>
<td align='center'>". $registro["sendfrom"] ."</td>
<td>";
}


?><div align="center">
<a href="readsms.php?id=<?= $registro["id"] ?>&option=read" title="Read Message">Прочитать</a>
</div>
</td>
<td>
<div align="center">
<form method="post" action="messenger.php?id=<?= $registro["id"] ?>&option=delete">
<input type="submit" value="удалить" class="button">
</form></div>
</td>
</tr>

<?

} // fin del bucle de ordenes



?>
</table>
</div>




<? include('footer.php'); ?>
