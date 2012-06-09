<?php if(user::auth()){ 
if(isset($_POST['editk'])){
	if(user::edit(user::$id,$_POST['spass'],$_POST['smail'],$_POST['swmz']))
		echo "Данные успешно изменены";
	else
		echo user::$err;
}else{
	echo '<form action=\'./\' method=\'POST\'>
	<input type="hidden" name="p" value="panel_ank" />
	<input type="hidden" name="n" value="0" />
	<input type="hidden" name="editk" value="t" />
	<table class="defpagtab">
	<tr><td>Имя:</td><td>'.user::$name.'</td></tr>
	<tr><td>Пароль:</td><td><input class="text" name=\'spass\' autocomplete="off" value="'.user::$pass.'" type="text"></td></tr>
	<tr><td>Эл. почта:</td><td><input class="text" name=\'smail\' autocomplete="off" value="'.user::$email.'" type="text"></td></tr>
	<tr><td>WMZ:</td><td><input class="text" name=\'swmz\' autocomplete="off" value="'.user::$wmz.'" type="text"></td></tr>
	</table>
	';
	echo '<br><input type="image" src="img/btn_ok.gif" value="ok"/></form>';
}
} ?>