<?php
include("funcs.php");
$mrh_login = "rubuxone";       // your login here
$mrh_pass2 = "ewrgt67jhdj8";   // merchant pass2 here

$out_summ = $_POST['out_summ'];
$inv_id = $_POST['inv_id'];
$crc = $_POST['crc'];

$crc = strtoupper($crc);   // force uppercase

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));

if (strtoupper($my_crc) != strtoupper($crc))
{
  echo "bad sign\n";
  exit();
}

engine::connectsql();
$sql = mysql_query("SELECT *  FROM `engine_getpay` WHERE `check`='$inv_id'") or die(mysql_error());
$sql = mysql_fetch_array($sql);
$sql = $sql['username'];
mysql_query("UPDATE `engine_users` SET money=money+$out_summ WHERE username='".$sql."'");
engine::disconnectsql();

echo "OK$inv_id\n";