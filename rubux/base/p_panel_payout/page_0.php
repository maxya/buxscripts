<?php if(user::auth()){ ?>
<?php 
$minpayout = engine::$minpayout;
engine::connectsql();
$balance = mysql_query("SELECT * FROM engine_users WHERE username='".user::$name."'");
$balance = mysql_fetch_array($balance);
$reqallr = mysql_query("SELECT * FROM engine_payreq WHERE user='".user::$name."'");
$reqallr = mysql_num_rows($reqallr);

if($reqallr<1){
if (isset($_GET['getmoney'])){
	if ($balance['money'] < $minpayout) {
		$hn=$minpayout-$balance['money'];
		echo "�� ���������� ������ ��� ������ � �������: <b>".$hn."$</b><br><br>";
	}else{
		/*mysql_query("INSERT INTO engine_payreq (`user`,`count`) VALUES ('".user::$name."','".$balance['money']."');") or die(mysql_error());*/$ttt=time();
		$summ=$_GET['summa'];
		mysql_query("INSERT INTO engine_payme (`name`,`summ`,`date`) VALUES ('".user::$name."','".$summ."','".$ttt."');") or die(mysql_error());
		mysql_query("UPDATE engine_users SET money=money-$summ WHERE username='".user::$name."';") or die(mysql_error());
		echo "������ �� ������� � ������� <b>".$summ."$</b> ������.";
		mysql_query("INSERT INTO engine_msg (`user`,`from`,`msg`,`time`) VALUES ('".user::$name."', '#adm#', '<b>����� �������</b> - ����� ������� �������� � ���������, ����� ������������� � ���� ���������', '".time()."');") or die(mysql_error());
	}
}else{
echo "�� ����� �������: <b>".$balance['money']."$</b><br>
	����������� ����� ��� ������: <b>$minpayout$</b>";

echo '<form action=\'./\' method=\'GET\'>
		<input type="hidden" name="p" value="panel_payout" />
		<input type="hidden" name="n" value="0" />
		<input type="hidden" name="getmoney" value="t" />';
		echo "����� ������: <input type=\"text\" name=\"summa\" value=\"$minpayout\" size=\"3\" />";
echo '<br><br><input type="image" src="img/btn_zakaz.gif" value="��������"/></form><br><br>';
}}else{
	echo "��� ����� ������� ��������� � ���������.";
}
engine::disconnectsql();
?>

<?php } ?>