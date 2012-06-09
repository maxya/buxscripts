<?php include("../funcs.php"); 
if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){
?>
<html>
<head>
<title>Админ панель</title>
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div style="position: absolute; padding: 10 0 0 10;">
<font size="3">Статистика</font><br>
<a href="./admin.php?p=stats">Общая статистика</a><br>
<br>
<font size="3">Пользователи</font><br>
<a href="./admin.php?p=users_1">Найти пользователей</a><br>
<br>
<font size="3">Сообщения</font><br>
<a href="./admin.php?p=msg_read">Прочесть/ответить на сообщения</a><br>
<a href="./admin.php?p=msg_write">Написать сообщение</a><br>
<br>

<font size="3">Реклама</font><br>
<a href="./admin.php?p=ad_query">Запросы</a><br>
<br>
<font size="3">Выплаты</font><br>
<a href="./admin.php?p=pay_me">Обработать</a><br>
<br>
</div>

<div style="position: absolute; margin: 20 0 0 300">
<?php
if(isset($_REQUEST['p'])) include($_REQUEST['p'].".php"); else include("stats.php"); 
?>
</div>

</body>
</html>
<? }else{ echo "Вы не можете находиться на этой странице";} ?>