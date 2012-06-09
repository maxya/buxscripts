<?php

echo "Всего ссылок для посещения: ".engine::adscount()."<br>";
if(user::auth()) {echo "Вами посещено сайтов: ".user::visitscount()."<br>";}

echo "<br>";

engine::connectsql();
$table = mysql_query("SELECT id FROM engine_ads_categories ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
engine::disconnectsql();
while ($catalog = mysql_fetch_array($table)) {
	engine::connectsql();
	$sql = "SELECT * FROM engine_ads_categories WHERE id='$catalog[id]'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	engine::disconnectsql();
	?>

<table class="serftab" width="100%" align="center" cellpadding="0" cellspacing="0">

<tr>
	<td width="61%" class="serfcatname"><b><font class="catn">&nbsp;<? echo $row["catname"] ?></font></b></td>
    <td class="serfcatname"><b><font class="catn">&nbsp;Пользователей</font></b></td>
    <td class="serfcatname"><b><font class="catn">&nbsp;Гостей</font></b></td>
    <td class="serfcatname"><b><font class="catn">&nbsp;Всего</font></b></td>
</tr>


<?php
engine::connectsql();
$table2 = mysql_query("SELECT * FROM engine_ads WHERE category='".$row["id"]."' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
while ($catalog2 = mysql_fetch_array($table2)) {
	$totalserfs = $catalog2["members"]+$catalog2["outside"];
	if($totalserfs<$catalog2["plan"]){
		if(isset($_COOKIE["engNick"]) && isset($_COOKIE["engPass"]))
		{
		$queryvis = mysql_query("SELECT * FROM engine_visits WHERE username='".$_COOKIE["engNick"]."' and ident='".$catalog2["ident"]."'"); # Проверка посещал ли юзер эту рекламу
		$rowvisc = mysql_num_rows($queryvis);
		if($rowvisc>0){
			echo '<tr><td class="serfurl" width="61%">&nbsp;<font class="visited">'.$catalog2["description"].'</font></td>
					<td class="serfurl">&nbsp;'.$catalog2["members"].'</td>
					<td class="serfurl">&nbsp;'.$catalog2["outside"].'</td>
					<td class="serfurl">&nbsp;'.$totalserfs.'</td></tr>';
		}else{
			echo '<tr><td class="serfurl" width="61%">&nbsp;<a href="./base/system/view.php?ad='.$catalog2["ident"].'" target="_blank">'.$catalog2["description"].'</a></td>
					<td class="serfurl">&nbsp;'.$catalog2["members"].'</td>
					<td class="serfurl">&nbsp;'.$catalog2["outside"].'</td>
					<td class="serfurl">&nbsp;'.$totalserfs.'</td></tr>';
		}
		}else{
		echo '<tr><td class="serfurl" width="61%">&nbsp;<a href="./base/system/view.php?ad='.$catalog2["ident"].'" target="_blank">'.$catalog2["description"].'</a></td>
					<td class="serfurl">&nbsp;'.$catalog2["members"].'</td>
					<td class="serfurl">&nbsp;'.$catalog2["outside"].'</td>
					<td class="serfurl">&nbsp;'.$totalserfs.'</td></tr>';
		}
	}
}
engine::disconnectsql();
?>
 <!--	<td width="61%">text1</td><td>text2</td><td>text3</td><td>text4</td>-->


</table>
<br>
<?php } ?>