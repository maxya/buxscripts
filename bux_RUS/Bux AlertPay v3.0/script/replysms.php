<? 
session_start();
 include('header.php');
?>



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

if (isset($_POST["sendto"])) {
require('config.php');



if( strtolower($_POST['code'])!= strtolower($_SESSION['texto'])){ 
echo "SECURITY CODE ERROR... <a href='replysms.php'> Go Back </a>"; 
include('footer.php');

exit();
}
$sendfrom=$_COOKIE["usNick"];
$sendto=limpiar($_POST["sendto"]);
$comments=limpiar($_POST["comments"]);

if ($sendto==""){echo "Error"; exit();}
if ($comments==""){echo "Error"; exit();}

$eltiempo=time();
$lafecha=date("d-m-y H:i",$eltiempo);

$query = "INSERT INTO tb_messenger (sendfrom, sendto, date, comments) VALUES('$sendfrom','$sendto','$lafecha','$comments')";
mysql_query($query) or die(mysql_error());

echo "<br><br><p>Your message has ben sent correctly.</p>";
include('footer.php');
?>
</font>


<?
exit();
}
?>
<br>
<div align="center"><div id="form">
<fieldset>
<legend>&nbsp;All Fields Required&nbsp;</legend>

<form method="POST" action="replysms.php">

<? 
require ('config.php');
$sendfrom=$_COOKIE["usNick"];

function limpiare($mensaje)
{$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;}
$to=limpiare($_GET["to"]);

?>

<input type="hidden" name="sendto" autocomplete="off" value="<? echo $to; ?>" />
<table width="400" border="0" align="center">
  <tr>
    <td width="150" align="left"><label>Comments</label></td>
    <td width="250" align="left"><textarea name="comments" rows="7" maxlength="200" onkeyup="return ismaxlength(this)" tabindex="1"></textarea></td>
  </tr>
  <tr>
    <td width="150" align="left"><p><label>Security Code</label></p></td>
    <td width="250" align="left"><input type='text' size='3' maxlength='3' name='code' autocomplete="off" class="securitycode" value="" tabindex="2" /></td>
  </tr>
  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="left"><img src="image.php?<?php echo $res; ?>" /></td>
  </tr>

  <tr>
    <td width="150" align="left">&nbsp;</td>
    <td width="250" align="right"><input type="submit" value="Submit" class="submit" tabindex="3" />
	</td>
  </tr>
</table>

</form>
</fieldset>
</div></div>

<? include('footer.php'); ?>