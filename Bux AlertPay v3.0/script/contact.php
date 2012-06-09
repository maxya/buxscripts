<? 
session_start();
?>


<? include('header.php'); ?>

        <br><h3>Contact Us</h3>
<br>



<script type="text/javascript">

/***********************************************
* Textarea Maxlength script- © Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/

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
echo "SECURITY CODE ERROR... "; 
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

echo "<br><br>Your message has ben sent correctly.";

?>
</font>
		<!--footer starts here-->
<? include('footer.php'); ?>
<?
exit();
}
?>
<? function limpiare2($mensaje)
{$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;}
?>




Use the form below to contact <? include('sitename.php'); ?> support. Replies may take up to 48 hours or more depending on our work load.
<br><br>

<div align="center"><div id="form">
<fieldset>
		                <fieldset><legend>&nbsp;Feel Free To Contact Us&nbsp;</legend>


<form method="POST" action="contact.php">

<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><p><label>Your Name</label></p></td>
    <td width="250" align="left"><input type="text" name="name" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="1" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Your E-mail</label></p></td>
    <td width="250" align="left"><input type="text" name="email" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Topic</label></p></td>
    <td width="250" align="left"><input type="text" name="topic" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="3" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Subject</label></p></td>
    <td width="250" align="left"><input type="text" name="subject" size="25" maxlength="100" autocomplete="off" class="field" value="" tabindex="4" /></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Comments</label></p></td>
    <td width="250" align="left"><textarea name="comments" rows="7" maxlength="200" onkeyup="return ismaxlength(this)" tabindex="5"></textarea></td>
  </tr>
    <tr>
    <td width="150" align="left"><p><label>Security Code </label></p></td>
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

</table>
</form>
</fieldset>
</div></div>

		<!--footer starts here-->
<? include('footer.php'); ?>

