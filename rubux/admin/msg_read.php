<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">Прочесть/ответить на сообщения</font><br><br>
Сообщения для администратора:<br><br>
<?php

if(isset($_GET['reply'])){
	if(!isset($_GET['ready'])){
		echo "<form action='./admin.php' method='GET'>";
		echo '<input type="hidden" name="p" value="msg_read" />';
		echo '<input type="hidden" name="ready" value="1" />';
		echo '<input type="hidden" name="reply" value="'.$_GET['reply'].'">';
		echo '<center>';
		echo "<input type='text' class=\"text\" size='80' name='msg' autocomplete=\"off\" value=\"\"/> <input type=\"submit\" value=\"Ок\" class=\"submit\"/>
		</center>
		</form>";
	}else{
		user::msg($_GET['reply'],"#adm#",$_GET['msg'],time());
		echo "Сообщение отправлено<br><br>";
	}
}elseif(isset($_GET['delete'])){
	engine::connectsql();
	mysql_query("DELETE FROM engine_msg WHERE id='".$_GET['delete']."'") or die(mysql_error());
	engine::disconnectsql();
}
 ?>
<table class="serftab" cellspacing="0" cellpadding="0">
<tr><td class="serfcatname" width="50px" style="padding: 2 2 2 2;">От</td><td class="serfcatname" width="400px" style="padding: 2 2 2 2;">Сообщение</td>
<td class="serfcatname" width="80px" style="padding: 2 2 2 2;">Действие</td>
</tr>
<?php
engine::connectsql();
$sql = mysql_query("SELECT * FROM engine_msg WHERE user='#adm#'") or die(mysql_error());
while($sqlz = mysql_fetch_array($sql)){
	echo '<tr><td style="padding: 2 2 2 2;">'.$sqlz['from'].'</td><td style="padding: 2 2 2 2;">'.$sqlz['msg'].'</td>
	<td style="padding: 2 2 2 2;"><a href="./admin.php?p=msg_read&reply='.$sqlz['from'].'">ответить</a> | <a href="./admin.php?p=msg_read&delete='.$sqlz['id'].'">удалить</a></td>
	</tr>';
}
engine::disconnectsql();
?>
</table>
<?php } ?>