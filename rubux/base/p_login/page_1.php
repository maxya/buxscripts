<?php

if(user::auth())
{
	echo "Вы уже зарегестрированы, как <b>".user::name()."</b>.";
}
elseif(isset($_REQUEST["username"]))
{
	if(isset($_REQUEST['ref'])) $ref=$_REQUEST['ref']; else $ref='';
	if(user::reg($ref,$_REQUEST['username'],$_REQUEST['password'],$_REQUEST['password2'],$_REQUEST['email'],$_REQUEST['koshel'], $HTTP_SERVER_VARS['REMOTE_ADDR']))
		echo "Вы успешно зарегистрированы, теперь вы можете авторизоваться используя указанные вами данные!";
	else
		echo user::$err;
}else{
?>
Для регистрации введите свои данные, все поля обязательны к заполнению<br><br>
<form action='./' method='POST'>
<input type="hidden" name="p" value="login" />
<input type="hidden" name="n" value="1" />
<input type="hidden" name="ref" value="<? echo $_GET['ref']; ?>" />
<table>
<tr><td>
<table class="formtab" width="300" border="0" align="center">
	<tr>
		<td width="300" align="left"><label>Логин</label></td>
		<td width="100" align="left"><input type='text' class="text" size='15' maxlength='25' name='username' autocomplete="off" value="" tabindex="1" /></td>
	</tr>
	<tr>
		<td width="150" align="left"><br><label>Пароль</label></td>
	<td width="150" align="left"><br><input type='password' class="text" size='15' maxlength='25' name='password' autocomplete="off" value="" tabindex="2" /></td>
	</tr>
	 <tr>
		<td width="150" align="left"><br><label>Повторите пароль</label></td>
	<td width="150" align="left"><br><input type='password' size='15' class="text"  maxlength='25' name='password2' autocomplete="off" value="" tabindex="3" /></td>
	</tr>
	<tr>
		<td width="150" align="left"><br><label>Эл. почта</label></td>
		<td width="150" align="left"><br><input type='text' size='15'class="text"  maxlength='25' name='email' autocomplete="off" value="" tabindex="4" /></td>
	</tr>
	<tr>
		<td width="150" align="left"><br><label>WMZ Кошелек</label></td>
		<td width="150" align="left"><br><input type='text' size='15'class="text" maxlength='25' name='koshel' autocomplete="off" value="" tabindex="5" /></td>
	</tr>

	<tr>
		<td width="150">&nbsp;&nbsp;</td>
		<td width="250" align="left"><br><input type="image" src="img/btn_ok.gif" value="Регистрация" class="submit" tabindex="6" />
		</td>
	</tr>



</table>

</td></tr>
</table>
</form>


<?php
}
?>