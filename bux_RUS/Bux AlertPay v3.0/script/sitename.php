<?

include('config.php');
$sql = "SELECT * FROM tb_site WHERE id='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
echo $row["sitename"]; 
mysql_close($con);
?>