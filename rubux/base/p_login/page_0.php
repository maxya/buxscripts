<?php
if(isset($_GET['exit'])) user::logout();
if(!user::auth()){
if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
	if(user::login($_REQUEST['username'], $_REQUEST['password'])){
	echo '<script>window.location="./?p=workers&n=0";</script>';
	}else{
		echo user::$err;
	}
}else{
?>
��� ����� � ������� ������� ���� ������.<br><br>
<form action='./' method='POST'>
<input type="hidden" name="p" value="login" />
<input type="hidden" name="n" value="0" />
<center>
<b>�����������</b><br><br>
�����<br>
<input type='text' class="text" size='15' maxlength='25' name='username' autocomplete="off" value=""/>
<br><br>
������<br>
<input type='password' class="text" size='15' maxlength='25' name='password' autocomplete="off" value=""/>
<br><br>
<input type="image" src="img/btn_voiti.gif" value="�����" class="submit"/>
</center>
</form>
<?php
}
}else{ echo "�� ��� ����� � ������� ��� ����� <b>".user::name()."</b>.";}
?>