<?php include("../funcs.php"); ?>
<html>
<head>
<title>����� ������</title>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div style="position: relative; padding: 100 0 0 0;">
<form action='./' method='POST'>
<center>
<?
if(isset($_POST['username']) && isset($_POST['password'])){
	if($_POST['username']=="admin" && $_POST['password']=="admin"){
		echo '<SCRIPT LANGUAGE="JavaScript">
		function setCookie(name, value, expires, path, domain, secure) {
		if (!name || !value) return false;
		var str = name + \'=\' + encodeURIComponent(value);	
		document.cookie = str;
		return true;
		}
		setCookie("admNick","'.$_POST['username'].'");
		setCookie("admPass","'.$_POST['password'].'");
		</SCRIPT>';
		echo '<a href="./admin.php"><b>�����</b></a>';
	}else{
		echo "<b>������ ��������</b>";
	}
}
?><br><br>
<b>�����������</b><br><br>
�����<br>
<input type='text' class="text" size='15' maxlength='25' name='username' autocomplete="off" value=""/>
<br><br>
������<br>
<input type='password' class="text" size='15' maxlength='25' name='password' autocomplete="off" value=""/>
<br><br>
<input type="submit" value="�����" class="submit"/>
</center>
</form>
</div>


</body>
</html>