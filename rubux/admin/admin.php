<?php include("../funcs.php"); 
if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){
?>
<html>
<head>
<title>����� ������</title>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div style="position: absolute; padding: 10 0 0 10;">
<font size="3">����������</font><br>
<a href="./admin.php?p=stats">����� ����������</a><br>
<br>
<font size="3">������������</font><br>
<a href="./admin.php?p=users_1">����� �������������</a><br>
<br>
<font size="3">���������</font><br>
<a href="./admin.php?p=msg_read">��������/�������� �� ���������</a><br>
<a href="./admin.php?p=msg_write">�������� ���������</a><br>
<br>

<font size="3">�������</font><br>
<a href="./admin.php?p=ad_query">�������</a><br>
<br>
<font size="3">�������</font><br>
<a href="./admin.php?p=pay_me">����������</a><br>
<br>
</div>

<div style="position: absolute; margin: 20 0 0 300">
<?php
if(isset($_REQUEST['p'])) include($_REQUEST['p'].".php"); else include("stats.php"); 
?>
</div>

</body>
</html>
<? }else{ echo "�� �� ������ ���������� �� ���� ��������";} ?>