<?
# ------ Настройка базы данных ------
$db_host = "localhost";
$db_user = "souljaboy_bux";
$db_password = "123456";
$db_base = "souljaboy_bux";

#$db_host = "localhost";
#$db_user = "souljaboy_bux";
#$db_password = "123456";
#$db_base = "souljaboy_bux";
$url = "http://bux.tokzic.hostia.ru/";
# ------ Подключение к MySQL --------
#$con = mysql_connect($db_host, $db_user, $db_password);
#mysql_query("/*!40101 SET NAMES 'cp1251' */");
#mysql_select_db($db_base, $con);
# ------ Настройка переменных -------
engine::connectsql();
$conf_con = mysql_query("SELECT * FROM engine_config WHERE name='def_user_payment'");
$conf_row = mysql_fetch_array($conf_con);
$conf_madd_user_default = $conf_row["value"];
$conf_con = mysql_query("SELECT * FROM engine_config WHERE name='premium_user_payment'");
$conf_row = mysql_fetch_array($conf_con);
$conf_madd_user_premium =$conf_row["value"];
$conf_madd_ref = mysql_query("SELECT * FROM engine_config WHERE name='def_ref_payment'");
$conf_madd_premref = mysql_query("SELECT * FROM engine_config WHERE name='premium_ref_payment'");
engine::disconnectsql();
?>