<?php if(user::auth()){
if(isset($_GET['bty'])){
	if($_GET['bty']=="self"){
		if(!isset($_GET['selfready'])){
	echo "Ниже представлен список из 50 самых свежих рефералов у которых баланс более 0.005$:<br><br>";
	?>
	<form action='./' method='GET'>
		<input type="hidden" name="p" value="panel_buyrefs" />
		<input type="hidden" name="n" value="0" />
		<input type="hidden" name="bty" value="self" />
		<input type="hidden" name="selfready" value="0" />
	<table class="serftab" width="100%" align="left" cellpadding="0" cellspacing="0">
		<tr>
			<td class="serfcatname">&nbsp;<b>Купить</b></td>
			<td class="serfcatname">&nbsp;<b>Ник</b></td>
   			<td class="serfcatname">&nbsp;<b>Рефералов</b></td>
   			<td class="serfcatname">&nbsp;<b>На счету</b></td>
   			<td class="serfcatname">&nbsp;<b>Премиум</b></td>
		</tr>
			<?php
			engine::connectsql();
			$table2 = mysql_query("SELECT id,username,referals,money,account FROM engine_users WHERE (money>0.005 AND referer='') ORDER BY ABS(joindate) DESC LIMIT 0,50") or die(mysql_error());
			while ($catalog2 = mysql_fetch_array($table2)) {
				if($catalog2['id']!=user::$id){
						echo '<tr>
							<td class="serfurl">&nbsp;<input type="checkbox" name="buyrefid[]" value="'.$catalog2['id'].'"></font></td>
							<td class="serfurl">&nbsp;'.$catalog2["username"].'</font></td>
							<td class="serfurl">&nbsp;'.$catalog2["referals"].'</td>
							<td class="serfurl">&nbsp;'.$catalog2["money"].'$</td>
							<td class="serfurl">&nbsp;'.$catalog2["account"].'</td></tr>';
				}
			}
			engine::disconnectsql();
			?>
	</table>&nbsp;<br><input type="image" src="img/btn_buy.gif" value="Заказать"/></form>
	<?php
}else{
	if(isset($_GET['buyrefid'])){
	$arrrefs=$_GET['buyrefid'];
	echo "Вы выбрали выбрали рефералов: ".count($arrrefs).". Стоимость:".count($arrrefs)."$<br><br>";
	if(user::$money>=count($arrrefs)){
	foreach ($arrrefs as $key){
		engine::connectsql();
		$zz = mysql_query("SELECT * FROM engine_users WHERE id='$key'") or die(mysql_error());
		$zz = mysql_fetch_array($zz);
		if($zz['referer']!="") {echo "Ошибка"; die();}
		mysql_query("UPDATE engine_users SET referer='".user::$name."' WHERE id='$key' ") or die(mysql_error());
		engine::disconnectsql();
	}
	engine::connectsql();
	mysql_query("UPDATE engine_users SET money=money-".count($arrrefs)." WHERE username='".user::$name."' ") or die(mysql_error());
	mysql_query("UPDATE engine_users SET referals=referals+".count($arrrefs)." WHERE username='".user::$name."' ") or die(mysql_error());
	engine::disconnectsql();
	echo "<br>Покупка прошла успешна";
	}else{
		echo "У вас не достаточно денег на балансе.";
	}}else{
		echo "Ошибка";
	}
}
}elseif($_GET['bty']=="rand"){
	if(isset($_GET['refcount'])){
		if(engine::freerefcount()<$_GET['refcount']){
			echo "<b>В системе нет столько рефералов</b><br><br>";
		}elseif(user::$money<$_GET['refcount']){
			echo "<b>Не достаточно средст на балансе</b><br><br>";
		}else{
			if(user::getrandomrefs($_GET['refcount'])){
				mysql_query("UPDATE engine_users SET money=money-".$_GET['refcount']." WHERE username='".user::$name."'") or die(mysql_error());
				echo "Вы успешно купили <b>".$_GET['refcount']."</b> рефералов. <br><br>";
			}
		}
	}
	?>
	<form action='./' method='GET'>
		Введите количество: 
		<input type="text" name="refcount" size="4" />
		<input type="hidden" name="p" value="panel_buyrefs" />
		<input type="hidden" name="n" value="0" />
		<input type="hidden" name="bty" value="rand" />
		<br><br>
		<input type="image" src="img/btn_buy.gif" value="Заказать"/>
	</form>
	
	<?
}
}else{

?>
Цена 1 реферала = 1$<br>
Свободных рефералов: <?=engine::freerefcount()?><br>


<form action='./' method='GET'>
		<input type="hidden" name="p" value="panel_buyrefs" />
		<input type="hidden" name="n" value="0" />
		<input type="hidden" name="buyref" value="t" />
<br>
<input type="radio" name="bty" value="rand" checked> Купить любых<br>
<input type="radio" name="bty" value="self"> Выбрать вручную самых активных<br>

<br><input type="image" src="img/btn_buy.gif" value="Заказать"/></form><br><br>
<?
}
?>

<?php } ?>