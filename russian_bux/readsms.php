<? 
session_start();
?>

<?
 include('header.php');
require ('config.php');

function limpiare($mensaje)
{$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;}
$id=limpiare($_GET["id"]);
$lole=$_COOKIE["usNick"];
$sql = "SELECT * FROM tb_messenger where id='$id' and sendto='$lole'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
$query = "UPDATE tb_messenger SET status='read' where id='$id'"; mysql_query($query) or die(mysql_error());
mysql_close($con);
?>
<br>
<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;Прочитайте Сообщение&nbsp;</legend>

<form method="POST" action="replysms.php?to=<?= $row["sendfrom"] ?>">
<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><label>Дата</label></td>
    <td width="250" align="left"><? echo $row["date"]; ?></td>
  </tr>
  <tr>
    <td width="150" align="left"><label>От</label></td>
	<td width="250" align="left"><? echo $row["sendfrom"]; ?></td>
  </tr>
  <tr>
    <td width="150" align="left"><label>Сообщение</label></td>
	<td width="250" align="left"><? echo $row["comments"]; ?></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Ответ" class="submit" tabindex="4" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>
<? include('footer.php'); ?>
