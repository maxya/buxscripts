<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">Список пользователей</font><br><br>
Найти пользователя:<br><br>
<form action='./admin.php' method='GET'>
<input type="hidden" name="p" value="users_1" />
<center>
<select name="tofind">
<option value="username" selected>username</option>
<option value="email">email</option>
</select>
<input type='text' class="text" size='25' name='value' autocomplete="off" value=""/> <input type="submit" value="Ок" class="submit"/>
</center>
</form>

<?php if(isset($_GET['addm'])){ ?>
<form>
<input type="hidden" name="p" value="users_1" />
<input type="hidden" name="tofind" value="<?=$_GET['tofind'] ?>" />
<input type="hidden" name="value" value="<?=$_GET['value'] ?>" />
<input type="hidden" name="addm" value="<?=$_GET['addm'] ?>" />
<center>
Добавить денег: <input type='text' class="text" size='10' name='moneytoadd' autocomplete="off" value=""/> <input type="submit" value="Ок" class="submit"/>
</center>
</form>
<?php } ?>

<center>
<?php
if(isset($_GET['moneytoadd'])){
	engine::connectsql();
	mysql_query("UPDATE engine_users SET money=money+".$_GET['moneytoadd']." WHERE id='".$_GET['addm']."'") or die(mysql_error());
	engine::disconnectsql();
	echo "Деньги добавлены";
	echo "<br><br>";
}?>
</center>

<table class="serftab" cellspacing="0" cellpadding="0">
<tr><td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">ID</td>
<td class="serfcatname" width="60px" style="padding: 2 2 2 2;" align="center">username</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">password</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">ip</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">email</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">wmz</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">referer</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">referals</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">money</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">joindate</td>
<td class="serfcatname" width="50px" style="padding: 2 2 2 2;" align="center">account</td>
<td class="serfcatname" width="80px" align="center">Действие</td></tr>
<?php

if(isset($_GET['value'])){
	engine::connectsql();
	if(isset($_GET['sort'])) $sort = $_GET['sort']; else $sort = 'id';
	if(isset($_GET['sorttype'])) $sorttype = $_GET['sorttype']; else $sorttype = "ASC";
	$sql = mysql_query("SELECT * FROM engine_users WHERE ".$_GET['tofind']." LIKE '%".$_GET['value']."%' ORDER by ABS($sort) $sorttype") or die(mysql_error());
	while($sqlz = mysql_fetch_array($sql)){
		echo '<tr><td style="padding: 0 3 0 3;" align="center">'.$sqlz['id'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['username'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['password'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['ip'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['email'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['wmz'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['referer'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['referals'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['money'].'&nbsp;<a href="./admin.php?p=users_1&tofind='.$_GET['tofind'].'&value='.$_GET['value'].'&addm='.$sqlz['id'].'"><b>|+|</b></a>&nbsp;</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['joindate'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['account'].'</td>
		<td style="padding: 0 3 0 3;" align="center">'.$sqlz['id'].'</td>
	</tr>';
	}
	engine::disconnectsql();
}
?>
</table>



<?php } ?>