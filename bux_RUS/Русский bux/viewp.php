<?
session_start();


require('config.php');
require('funciones.php');



$adse=limpiar($_GET["ad"]);



if(!isset($_COOKIE["usNick"]) && !isset($_COOKIE["usPass"]))
{
      $sqlz = "SELECT * FROM tb_ads WHERE id='$adse'";
      $resultz = mysql_query($sqlz);        
      $myrowz = mysql_fetch_array($resultz);

$numero=$myrowz["outside"];

      $sqlex = "UPDATE tb_ads SET outside='$numero' +1 WHERE id='$adse'";
      $resultex = mysql_query($sqlex);

}


$checkad = mysql_query("SELECT id FROM tb_ads WHERE id='$adse'");
$ad_exist = mysql_num_rows($checkad);

if ($ad_exist<1) {
// En caso de no existir el referer damos un mensaje de error
echo "Error"; exit();
}


?>


<html>

<head>

<meta http-equiv="Pragma" content="no-cache">

<meta http-equiv="Expires" content="-1">

<link rel="stylesheet" type="text/css" href="css.css"><title><? include('sitename.php'); ?> |.СМОТРИТЕ.КЛИКАЙТЕ.ЗАРАБАТЫВАЙТЕ</title>

<script>

var x = 21

var y = 1

function startClock(){

if(x!=='подождите...'){

x = x-y

document.frm.clock.value = x

setTimeout("startClock()", 1000)

}

if(x==0){

x='просмотрено';

document.frm.clock.value = x;

success.location.href="successp.php?ad="+document.frm.id.value+"&verify="+document.frm.verify.value;

}}

</script>

</head>

			
			<body leftmargin="0" rightmargin="0" topmargin="0" bottommargin="0" onLoad="startClock()">

			

			<form name="frm" method="post">
			
			<input type="hidden" name="id" value="<? echo $adse ?>">
			
<input type="hidden" name="verify" value="<? include('thecodero.php'); ?>">
			
			 <table border="0" cellpadding="0" cellspacing="0" width="100%">
			
				<tbody>
			
				  <tr> 
			
					<td class="maintopright" style="border-bottom: 2px solid rgb(51, 51, 51); font-family: Verdana; font-size: 10px;" width="50%">
			
					  <div class="maintopright">&nbsp;&nbsp;<? include('sitename.php'); ?>&nbsp;&nbsp;&nbsp;&nbsp;

			
					  <input name="clock" size="-1" readonly="readonly" style="border: medium none ; padding: 0pt; font-size: 20pt; font-family: Verdana; vertical-align: top;" type="text">
			
					  <iframe name="success" src="grayblank.htm" border="0" framspacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" style="vertical-align: top;" frameborder="0" height="40" scrolling="no" width="40"></iframe>
			
					  </div>
			
					</td>
			
					<td style="border-bottom: 2px solid rgb(51, 51, 51); font-family: Verdana; font-size: 13px; " align="left" valign="middle" width="50%">
			
						<strong>Пожалуйста, просмотрите сайт рекламодателя.
<br>
			
					 </td>
			
					</tr>
			
				  </tbody>
			
			 </table>
			
			 <iframe src="<? require ('config.php');
$sql = "SELECT * FROM tb_ads WHERE id='$adse'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);


echo $row["url"];
?>" border="0" framspacing="0" marginheight="0" marginwidth="0" vspace="0" hspace="0" frameborder="0" height="100%" scrolling="yes" width="100%"></iframe>
			



			</form>
			
			</body>
			
			
</html>
