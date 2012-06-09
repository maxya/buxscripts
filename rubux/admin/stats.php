<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">Общая статистика</font><br><br>

Зарегистрированных пользователей:
<?php engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

Пользователей без реферера:
<?php engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE referer=\"\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>



Пользователи с балансом более 0.005:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE money>0.005");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

Пользователи с более чем одним рефералом:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE referals>1");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br><br>

Без премиума:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br><br>

Silver премиумов:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"Silver\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

Gold премиумов:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"Gold\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

Platinum премиумов:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"Platinum\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br><br>

Всего денег на счету:
<? engine::connectsql();
$sql = mysql_query("SELECT SUM(money) FROM engine_users");
$sql = mysql_result($sql,0,0);
echo $sql;
engine::disconnectsql(); ?>$
<br>
<?php } ?>