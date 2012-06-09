<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">Заказы:</font><br><br>
Не обработанные заказы:<br><br>
<?php
if(isset($_GET['ok1'])){
	engine::connectsql();$ok1=$_GET['ok1'];
	mysql_query("UPDATE engine_payme SET status=1 WHERE id='$ok1'") or die(mysql_error());
	engine::disconnectsql();
	echo "Статус изменён на \"оплачено\"";
	echo "<br><br>";
}
if(isset($_GET['notok1'])){
	engine::connectsql();$ok1=$_GET['notok1'];
	mysql_query("UPDATE engine_payme SET status=2 WHERE id='$ok1'") or die(mysql_error());
	engine::disconnectsql();
	echo "Статус изменён на \"отменено\"";
	echo "<br><br>";
}?>
</center>

<table class="serftab" cellspacing="0" cellpadding="0">
<tr><td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">ID</td>
<td class="serfcatname" width="60px" style="padding: 2 2 2 2;" align="center">Имя</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">Сумма</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">Время</td>
<td class="serfcatname" width="80px" align="center">Действия</td></tr>
<?php
	engine::connectsql();
	$sort = 'id';
	$sorttype = "ASC";
	$sql = mysql_query("SELECT * FROM engine_payme WHERE status=0;") or die(mysql_error());
	while($sqlz = mysql_fetch_array($sql)){$ptime=time()-$sqlz['date'];$ptime=$ptime/86400;settype($ptime, "integer");
		echo '<tr><td style="padding: 0 3 0 3;" align="center">'.$sqlz['id'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['name'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['summ'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$ptime.'д.</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['money'].'<a href="./admin.php?p=pay_me&ok1='.$sqlz['id'].'"><b>оплачено</b></a>&nbsp;<a href="./admin.php?p=pay_me&notok1='.$sqlz['id'].'"><b>отменить</b></a></td>
	</tr>';
	}
	engine::disconnectsql();
}
?>
</table>