<?php if($_COOKIE['admNick']=="admin" && $_COOKIE['admPass']="admin"){ ?>
<font size="3">����� ����������</font><br><br>

������������������ �������������:
<?php engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

������������� ��� ��������:
<?php engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE referer=\"\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>



������������ � �������� ����� 0.005:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE money>0.005");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

������������ � ����� ��� ����� ���������:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE referals>1");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br><br>

��� ��������:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br><br>

Silver ���������:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"Silver\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

Gold ���������:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"Gold\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br>

Platinum ���������:
<? engine::connectsql();
$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users WHERE account=\"Platinum\"");
$sql = mysql_fetch_array($sql);
echo $sql['count'];
engine::disconnectsql(); ?>
<br><br>

����� ����� �� �����:
<? engine::connectsql();
$sql = mysql_query("SELECT SUM(money) FROM engine_users");
$sql = mysql_result($sql,0,0);
echo $sql;
engine::disconnectsql(); ?>$
<br>
<?php } ?>