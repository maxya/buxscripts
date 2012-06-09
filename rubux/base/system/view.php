<?
include ("../../funcs.php");

$adse=correct($_GET["ad"]);

if(!engine::availible($adse)){
	echo "<b>Ошибка:</b> Cсылки не существует"; exit();
}
if (!engine::adexist($adse)) {
echo "<b>Ошибка:</b> Cсылки не существует"; exit();
}

?>

<html>
<head>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="-1">
<script>
var x = 16
var y = 1
function startClock(){
if(x!=='Готово'){
x = x-y
document.frm.clock.value = x
setTimeout("startClock()", 1000)
}
if(x==0){
x='Готово';
document.frm.clock.value = x;
success.location.href="success.php?ad="+document.frm.id.value+"&verify="+document.frm.verify.value;
}}
</script>
</head>
<body bgcolor="white" leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" onLoad="startClock()">
<form name="frm" method="post">
<input type="hidden" name="id" value="<? echo $adse ?>">
<input type="hidden" name="verify" value="1">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
  <tr>
	<td class="maintopright" style="border-bottom: 1px solid #ba8f2f; font-family: Verdana; font-size: 13px;" width="50%">

<table style="margin: 0 0 0 0; width: 100%;" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
        	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=4,0,0,0" width="220" height="70" id="1_fla" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="rubuxflash.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#ffffff" />
			<embed src="rubuxflash.swf" quality="high" bgcolor="#ffffff" width="220" height="70" name="1_fla" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		</td>
        <td valign="middle"><input name="clock" readonly="readonly" style="font-family: Tahoma; color: black;font-size: 18; border: none ; background: none;"></td>
        <td><iframe name="success" src="blank.html" border="0" framspacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" style="vertical-align: top;" frameborder="0" height="20" scrolling="no" width="400"></iframe></td>
        <td width="100%"></td>
    </tr>
</table>

</td>
</tr>

</tbody>
</table>

<iframe src="<?
engine::connectsql();
$sql = "SELECT url FROM engine_ads WHERE ident='$adse'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["url"];
?>" border="0" framspacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" frameborder="0" height="100%" scrolling="yes" width="100%"></iframe>

<iframe src="http://rubux.ru" border="0" framspacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" frameborder="0" height="0%" scrolling="no" width="100%"></iframe>
		</form>
		</body>
</html>