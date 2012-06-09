<?php if(user::auth()){ ?>
<table class="defpagtab" width="80%" align="left"><tr><td>
Ваша реферальная ссылка: http://www.RuBux.ru/?id=<?=user::$name ?><br>
<a href="?p=panel_refs&n=0">Сортировка по дате регистрации</a> (новые сверху)<br>
<a href="?p=panel_refs&n=0&bybalance">Сортировка по балансу</a><br>
<br>
<?php
if (isset($_GET['bybalance'])){
	$sort = "ABS(money) DESC";
}else{
	$sort = "id DESC";
}
engine::connectsql();
$addrt = mysql_query("SELECT * FROM engine_users WHERE referer='".user::$name."' ORDER BY $sort");

echo '<table class="serftab" width="100%" align="center" cellpadding="0" cellspacing="0">';
echo '<tr><td class="serfcatname">&nbsp;<b><font class="catn">Ник</font></b></td>
	<td class="serfcatname">&nbsp;<b><font class="catn">Баланс</font></b></td>
</tr>';
$rcount=0;
while ($catalog = mysql_fetch_array($addrt)) {
	$rcount++;
echo '<tr><td>&nbsp;'.$catalog["username"].'</td>
	  <td>&nbsp;'.$catalog["money"].'$</td>
</tr>';
}
echo '</table>';
echo "<br>Всего рефералов: $rcount";
?>
</td></tr></table>

<?php engine::disconnectsql();} ?>