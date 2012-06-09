
Всего денег на счетах: <b><?
engine::connectsql();
$sqryvar="Select sum(money) from engine_users";
$iqryvar=mysql_query($sqryvar);
$tot1=mysql_result($iqryvar,0,0);
echo $allmoney=$tot1;
?>$</b><br>
Пользователей без реферера: <b><?=engine::freerefcount()?></b><br>
<br><br>
<table width="100%">
<tr>
<td valign="top" width="300px">
По колличеству рефералов:<br><br>
<table class="serftab" width="100%" align="left" cellpadding="0" cellspacing="0">
<tr>
	<td class="serfcatname">&nbsp;<b>Ник</b></td>
    <td class="serfcatname">&nbsp;<b>Рефералов</b></td>
    <td class="serfcatname">&nbsp;<b>На счету</b></td>
    <td class="serfcatname">&nbsp;<b>Премиум</b></td>
</tr>
<?php
engine::connectsql();
$table2 = mysql_query("SELECT username,referals,money,account FROM engine_users ORDER BY ABS(referals) DESC LIMIT 0,10");
while ($catalog2 = mysql_fetch_array($table2)) {
			echo '<tr><td class="serfurl">&nbsp;'.$catalog2["username"].'</font></td>
					<td class="serfurl">&nbsp;'.$catalog2["referals"].'</td>
					<td class="serfurl">&nbsp;'.$catalog2["money"].'$</td>
					<td class="serfurl">&nbsp;'.$catalog2["account"].'</td></tr>';
}
engine::disconnectsql();
?>
</table>

</td>
</tr><tr>
<td valign="top">
<br><br>
По колличеству денег на счету:<br><br>
<table class="serftab" width="100%" align="left" cellpadding="0" cellspacing="0">
<tr>
	<td class="serfcatname">&nbsp;<b>Ник</b></td>
    <td class="serfcatname">&nbsp;<b>На счету</b></td>
    <td class="serfcatname">&nbsp;<b>Премиум</b></td>
</tr>
<?php
engine::connectsql();
$table2 = mysql_query("SELECT username,money,account FROM engine_users ORDER BY ABS(money) DESC LIMIT 0,10");
while ($catalog2 = mysql_fetch_array($table2)) {
			echo '<tr><td class="serfurl">&nbsp;'.$catalog2["username"].'</font></td>
					<td class="serfurl">&nbsp;'.$catalog2["money"].'$</td>
					<td class="serfurl">&nbsp;'.$catalog2["account"].'</td></tr>';
}
engine::disconnectsql();
?>
</table>

</td>
</tr>
</table><br><br>