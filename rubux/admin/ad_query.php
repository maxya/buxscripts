<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">Запросы рекламы</font><br><br>

<center>
<?php
if(isset($_GET['add'])){
	engine::connectsql();
	$sql = mysql_query("SELECT * FROM engine_ads_q WHERE id=".$_GET['add']."") or die(mysql_error());
	$sqlz = mysql_fetch_array($sql);
	engine::disconnectsql();
	engine::connectsql();
	mysql_query("INSERT INTO engine_ads (ident,type,username,plan,url,description,category) VALUES (".rand(1111111111,9999999999).",'serfurl','".$sqlz['email']."','".$sqlz['plan']."','".$sqlz['url']."','".$sqlz['descr']."',1)")	or die(mysql_error());
	engine::disconnectsql();
	engine::connectsql();
	mysql_query("DELETE FROM engine_ads_q WHERE id=".$_GET['add']."") or die(mysql_error());
	engine::disconnectsql();
	echo "Реклама добавлена";
	echo "<br><br>";
}?>
</center>

<table class="serftab" cellspacing="0" cellpadding="0">
<tr><td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">ID</td>
<td class="serfcatname" width="60px" style="padding: 2 2 2 2;" align="center">wmz</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">Описание</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">Ссылка</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">Email</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">План</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">К&nbsp;оплате</td>
<td class="serfcatname" width="80px" align="center">Действие</td></tr>
<?php


	engine::connectsql();
	if(isset($_GET['sort'])) $sort = $_GET['sort']; else $sort = 'id';
	if(isset($_GET['sorttype'])) $sorttype = $_GET['sorttype']; else $sorttype = "ASC";
	$sql = mysql_query("SELECT * FROM engine_ads_q ORDER by ABS(id)") or die(mysql_error());
	while($sqlz = mysql_fetch_array($sql)){
		echo '<tr><td style="padding: 0 3 0 3;" align="center">'.$sqlz['id'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['wmz'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.str_replace(" ","&nbsp;",$sqlz['descr']).'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['url'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['email'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['plan'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['topay'].'$</td>
		<td style="padding: 0 3 0 3;" align="center">
		<a href="./admin.php?p=ad_query&add='.$sqlz['id'].'">|Добавить|</a>&nbsp;<a href="./admin.php?p=ad_query&del='.$sqlz['id'].'">|Удалить|</a></td>
	</tr>';
	}
	engine::disconnectsql();

?>
</table>



<?php } ?>