<?php


include('config.php');


$uo_sessionTime = 5; //length in **minutes** to keep the user online before deleting



##########################################################
# No editing needed below
##########################################################

error_reporting(E_ERROR | E_PARSE);



$uo_ip = $_SERVER['REMOTE_ADDR'];


//cleanup part
$uo_query = "DELETE FROM users_online WHERE unix_timestamp() - lastvisit >= $uo_sessionTime * 60";
mysql_query($uo_query);

//check/insert part
$uo_query = "SELECT lastvisit FROM users_online WHERE visitor = '$uo_ip'";
$uo_result = mysql_query($uo_query);
if(mysql_num_rows($uo_result) == 0) { //no match
	$uo_query = "INSERT INTO users_online VALUES('$uo_ip', unix_timestamp())";
	mysql_query($uo_query);
} else { //matched, update them
	$uo_query = "UPDATE users_online SET lastvisit = unix_timestamp() WHERE visitor = '$uo_ip'";
	mysql_query($uo_query);
}

//count part
if($uo_keepquiet == FALSE) {
	$uo_query = "SELECT count(*) FROM users_online";
	$uo_result = mysql_query($uo_query);
	$uo_count = mysql_fetch_row($uo_result);

	echo $uo_count[0];
}

mysql_close($con);

?>