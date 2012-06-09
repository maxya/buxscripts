<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">Прочесть/ответить на сообщения</font><br><br>
Написать сообщение:<br><br>
<?php
if(isset($_GET['name']) && isset($_GET['msg'])){
	engine::connectsql();
	mysql_query("INSERT engine_msg (`user`,`from`,`msg`,`time`) VALUES ('".$_GET['name']."','#adm#','".$_GET['msg']."','".time()."')") or die(mysql_error());
	engine::disconnectsql();
	echo "Сообщение отправлено<br><br>";
}

?>
<form action='./admin.php' method='GET'>
<input type="hidden" name="p" value="msg_write" />
<center>
<input type='text' class="text" size='15' maxlength='25' name='name' autocomplete="off" value="Никнейм"/>
<input type='text' class="text" size='65' name='msg' autocomplete="off" value=""/> <input type="submit" value="Ок" class="submit"/>
</center>
</form>


<?php } ?>
