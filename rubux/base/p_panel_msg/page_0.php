<?php if(user::auth()){ ?>
<a href="?p=panel_msg&n=0&e">[ Очистить ]</a> (сообщения отправленные всем удаляются автоматически)<br>
<a href="?p=panel_msg&n=0&toadm">[ Написать администратору ]</a><br>
<br>
<?php
engine::connectsql();
mysql_query("UPDATE engine_msg SET new='0' WHERE user='".user::$name."'");
engine::disconnectsql();
$unick = user::$name;
$upass = user::$pass;
if(isset($_GET['toadm'])){
	echo '<form action=\'./\' method=\'GET\'>
	<input type="hidden" name="p" value="panel_msg" />
	<input type="hidden" name="n" value="0" />
	<input type="hidden" name="toadmq" value="t" />
';		
	echo 'Сообщение: <input class="text" name=\'admt\' autocomplete="off" value="" type="text">';
	echo ' <input type="submit" value="Отправить"></form><br>';
}
if(isset($_GET['toadmq'])){
	user::msg("#adm#",user::$name,$_GET['admt'],time());
	echo "Сообщение отправлено администратору, ждите ответа от #adm#<br><br>";
}
if(isset($_GET['e'])){
	engine::connectsql();
	$addrt = mysql_query("DELETE FROM engine_msg WHERE user = '".$unick."'");
	engine::disconnectsql();
}
engine::connectsql();
$addrt = mysql_query("SELECT * FROM engine_msg WHERE user='".$unick."' ORDER BY id ASC");

echo '<table class="serftab" width="100%" align="center" cellpadding="0" cellspacing="0">';
echo '<tr><td class="serfcatname" width="10%">&nbsp;<b><font class="catn">От</font></b></td>
	<td class="serfcatname">&nbsp;<b><font class="catn">Сообщение</font></b></td>
</tr>';

while ($catalog = mysql_fetch_array($addrt)) {
echo '<tr><td>'.$catalog["from"].'</td>
	  <td>'.$catalog["msg"].'</td>
</tr>';
}

$addrt = mysql_query("SELECT * FROM engine_msg WHERE user='#all#' ORDER BY id ASC");
while ($catalog = mysql_fetch_array($addrt)) {
echo '<tr><td>'.$catalog["from"].'</td>
	  <td>'.$catalog["msg"].'</td>
</tr>';
}




echo '</table>';
engine::disconnectsql();
} else{
echo 'Если вы хотите отправить сообщение, вам необходимо войти в аккаунт.';}
?>