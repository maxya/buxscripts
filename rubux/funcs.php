<?php

function correcturl($tester){
	$tester = str_replace("'"," ",$tester);
	$tester = str_replace("<"," ", $tester);
	return $tester;
}
	
function correctmsg($tester){
	$tester = str_replace("'"," ",$tester);
	$tester = str_replace('"'," ",$tester);
	$tester = str_replace(";"," ",$tester);
	$tester = str_replace("$"," ",$tester);
	return $tester;
}

function correct($tester){
	if($tester!=""){
		if (ereg("^[a-zA-Z0-9\-_]{3,255}$", $tester)) {
			$tester = htmlentities(stripslashes(trim($tester)));
			$tester = str_replace("'"," ",$tester);
			$tester = str_replace('"'," ",$tester);
			$tester = str_replace(";"," ",$tester);
			$tester = str_replace("$"," ",$tester);
			return $tester;
		}
	}
}

function correctmoney($tester){
	if($tester!=""){
		if (ereg("^[0-9\-_]{1,10}$", $tester)) {
			$tester = htmlentities(stripslashes(trim($tester)));
			$tester = str_replace("'"," ",$tester);
			$tester = str_replace('"'," ",$tester);
			$tester = str_replace(";"," ",$tester);
			$tester = str_replace("$"," ",$tester);
			return $tester;
		}
	}
}

function refurl($url){
	if(correct($url)) return "&id=".$url;
}

function correctmail($tester){
	if($tester!=""){
		if (ereg("^[a-zA-Z0-9\-_@/./]{3,255}$", $tester)) {
			return $tester;
		}else{
			return;
		}
	}
}

# Проверка активного пункта меню
function activemenu($page,$var){
	if(isset($_REQUEST['p'])){
		if($_REQUEST['p']==$page)
			echo 'background="img/am_'.$var.'.gif"';
		else
			echo '';
	}else{
		if($page=='home')
			echo 'background="img/am_'.$var.'.gif"';
		else
			echo '';
	}
}

function onlineuserscount(){
if ( $directory_handle = opendir( session_save_path() ) ) {
$count = 0;
while ( false !== ( $file = readdir( $directory_handle ) ) ) {
if($file != '.' && $file != '..'){
if(time()- fileatime(session_save_path() . '\\\\' . $file) < MAX_IDLE_TIME * 60) {
$count++;
}
} }
closedir($directory_handle);
return $count;
} else {
return false;
}}

# Класс движка
class engine {
		public static $db_host = "localhost";
	public static $db_user = "user";
	public static $db_password = "123456";
	public static $db_base = "base";
	/*
	public static $db_host = "localhost";
	public static $db_user = "user";
	public static $db_password = "123456";
	public static $db_base = "bd";
*/
	public static $conf_madd_premium = "0.015";
	public static $conf_madd_default = "0.01";
	public static $conf_wmz = "Z306106953164";
	
	public static $conf_click_price = "0.005";
	public static $conf_ref_click_price = "0.0025";
	
	public static $premium = array();
	
	#public static $timevar_year = "31536000";
	#public static $timevar_halfyear = "15768000";
	
	public static $minpayout = "19.99";
	
	public static $con;
	public static $engine_tab_name="engine";
	public static $err="Ошибки";
	
	public static function getpremium(){
		self::$premium['Silver']['name']="Silver";
		self::$premium['Gold']['name']="Gold";
		self::$premium['Platinum']['name']="Platinum";
		
		self::$premium['Silver']['price']=20;
		self::$premium['Gold']['price']=45;
		self::$premium['Platinum']['price']=150;
		
		self::$premium['Silver']['min']=15;
		self::$premium['Gold']['min']=10;
		self::$premium['Platinum']['min']=1;
		
		self::$premium['Silver']['refs']=5;
		self::$premium['Gold']['refs']=10;
		self::$premium['Platinum']['refs']=50;
		
		self::$premium['Silver']['refclick']="0.0035";
		self::$premium['Gold']['refclick']="0.0045";
		self::$premium['Platinum']['refclick']="0.006";
		
		self::$premium['Silver']['click']="0.006";
		self::$premium['Gold']['click']="0.008";
		self::$premium['Platinum']['click']="0.01";
	}
	public static function connectsql(){
		self::$con = mysql_connect(self::$db_host, self::$db_user, self::$db_password);
		mysql_query("/*!40101 SET NAMES 'cp1251' */");
		mysql_select_db(self::$db_base, self::$con);
	}
	
	public static function disconnectsql(){
		mysql_close(self::$con);
	}

	public static function adscount(){
		engine::connectsql();
		$adcount = mysql_query("SELECT id FROM ".self::$engine_tab_name."_ads");
		$adcount = mysql_numrows($adcount);
		engine::disconnectsql();
		return $adcount;
	}
	
	public static function adexist($adse){
		engine::connectsql();
		$checkad = mysql_query("SELECT id FROM engine_ads WHERE ident='$adse'");
		$ad_exist = mysql_num_rows($checkad);
		engine::disconnectsql();
		if($ad_exist>0) return $ad_exist;
	}
	
	public static function refreshadcount($type, $id){
		engine::connectsql();
		$advcount = mysql_query("SELECT * FROM engine_ads WHERE ident='$id'");
    	$advcountrow = mysql_fetch_array($advcount);
    	$updvisitscount=$advcountrow[$type]+1;
    	$updvcount = mysql_query("UPDATE engine_ads SET ".$type."='$updvisitscount' WHERE ident='$id'");
    	engine::disconnectsql();
	}

	public static function availible($adid){
		engine::connectsql();
		$sql = mysql_query("SELECT * FROM engine_ads WHERE ident='".$adid."'");
		$sql = mysql_fetch_array($sql);
		$all = $sql['members'] + $sql['outside'];
		if($sql['plan']>$all) return 1;
		
		engine::disconnectsql();
	}

	public static function freerefcount(){
		engine::connectsql();
		$sqryvar="SELECT COUNT(*) as count from engine_users WHERE referer = ''";
		$iqryvar=mysql_query($sqryvar);
		$row=mysql_fetch_array($iqryvar);
		engine::disconnectsql();
		return $row['count'];	
	}

}

# Класс пользователя
class user {
	public static $name;
	public static $pass;
	public static $money;
	public static $refcount;
	public static $engine_tab_name="engine";
	public static $err="Ошибки";
	public static $id;
	public static $email;
	public static $wmz;
	public static $account;
	public static $referer;
	public static $referals;
	public static $joindate;
	
	public static $newmsgcount;
	
    public static function auth() {
    	if(isset($_COOKIE['engNick']) && isset($_COOKIE['engPass'])){
			engine::connectsql();
			self::$name = correct($_COOKIE['engNick']);
			self::$pass = correct($_COOKIE['engPass']);
			$sql = "SELECT username,password,id,email,wmz,money,account,referer,referals,joindate FROM ".self::$engine_tab_name."_users WHERE username='".self::$name."'";
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
			if(self::$name == $row['username'] && self::$pass == $row['password']){
				self::$id = $row['id'];
				self::$email = $row['email'];
				self::$wmz = $row['wmz'];
				self::$money = $row['money'];
				self::$account = $row['account'];
				self::$referer = $row['referer'];
				self::$referals = $row['referals'];
				self::$joindate = $row['joindate'];
				engine::disconnectsql();
				return 1;
			}
			engine::disconnectsql();
		}
    }
    
    public static function name() {
    	return self::$name;
    }
    
    public static function money() {
    	engine::connectsql();
    	$result = mysql_query("SELECT money FROM ".self::$engine_tab_name."_users WHERE username='".self::$name."'");
    	$result = mysql_fetch_array($result);
    	$result = $result['money'];
    	self::$money = $result;
    	engine::disconnectsql();
    	return self::$money; 
    }
    
    public static function refcount() {
    	engine::connectsql();
    	$result = mysql_query("SELECT referals FROM ".self::$engine_tab_name."_users WHERE username='".self::$name."'");
    	$result = mysql_fetch_array($result);
    	self::$refcount = $result['referals'];
    	engine::disconnectsql();
    	return self::$refcount;
    }
    
    public static function reg($ref, $name, $pass, $pass2, $email, $wmz, $ip){
    	self::$err="";
    	if(!correct($name)){ self::$err .= "Не правильно заполнено поле \"<b>Логин</b>\"<br>";}
    	if(!correct($pass)){ self::$err .= "Не правильно заполнено поле \"<b>Пароль</b>\"<br>";}
    	if($pass!=$pass2){ self::$err .= "Пароли не совпадают<br>"; }
    	if(!correctmsg($email)){ self::$err .= "Не правильно заполнено поле \"<b>E-mail</b>\"<br>";}
		if(!correct($wmz)){ self::$err .= "Не правильно заполнено поле \"<b>wmz</b>\"<br>";}
		if(!correct($ref)){ $ref="";} else { self::$referer=$ref;}
		
    	if(self::$err){ return;  die();}
    	
    	engine::connectsql();
    	
    	$checkuser = mysql_query("SELECT username FROM ".self::$engine_tab_name."_users WHERE username='$name'");
    	$username_exist = mysql_num_rows($checkuser);
    	if($username_exist!=0){engine::disconnectsql(); self::$err .= "Логин <b>$name</b> уже существует"; return; die();}
    	    	
    	$checkemail = mysql_query("SELECT email FROM ".self::$engine_tab_name."_users WHERE email='$email'");
		$email_exist = mysql_num_rows($checkemail);
		if($email_exist!=0){engine::disconnectsql(); self::$err .= "Почта <b>$email</b> уже существует"; return; die();} 
    			
    	$checkwmz = mysql_query("SELECT wmz FROM ".self::$engine_tab_name."_users WHERE wmz='$wmz'");
		$wmz_exist = mysql_num_rows($checkwmz);
		if($wmz_exist!=0){engine::disconnectsql(); self::$err .= "WMZ кошелек <b>$wmz</b> уже существует"; return; die();}
    	
		$checkip = mysql_query("SELECT ip FROM ".self::$engine_tab_name."_users WHERE ip='$ip'");
		$ip_exist = mysql_num_rows($checkip);
    	if($ip_exist!=0){engine::disconnectsql(); self::$err .= "На ваш IP адрес уже зарегистрирован аккаунт"; return; die();}
    	
    	$checkref = mysql_query("SELECT username FROM ".self::$engine_tab_name."_users WHERE username='$ref'");
		$referer_exist = mysql_num_rows($checkref);
		
		$joindate = time();
		engine::disconnectsql();
    	if($ref!="") {
			engine::connectsql();
			$updrefcount = mysql_query("UPDATE engine_users SET referals=referals +1 WHERE username='".$ref."'");
			engine::disconnectsql();
		}
		engine::connectsql();
		$query = "INSERT INTO ".self::$engine_tab_name."_users (username, password, ip, email, wmz, referer, joindate) VALUES('$name','$pass','$ip','$email','$wmz','$ref','$joindate')";
		mysql_query($query) or die(mysql_error());
		
    	engine::disconnectsql();
    	return "OK";
    }
    
    public static function login($name, $pass){
    	self::$err="";
    	if(!correct($name)){ self::$err .= "Не правильно заполнено поле \"<b>Логин</b>\"<br>";}
    	if(!correct($pass)){ self::$err .= "Не правильно заполнено поле \"<b>Пароль</b>\"<br>";}
    	if(self::$err){ return;  die();}
    	
    	engine::connectsql();
    	
    	$query = mysql_query("SELECT username,password FROM ".self::$engine_tab_name."_users WHERE username = '$name'") or die(mysql_error());
    	$data_count = mysql_num_rows($query);
		$data = mysql_fetch_array($query);
    	
    	if($data_count==0) {engine::disconnectsql(); self::$err .= "Не найден указанный логин<br>"; return; die();}
		if($data['password'] != $pass) {engine::disconnectsql(); self::$err .= "Не верный пароль"; return; die();}
		
		echo '<SCRIPT LANGUAGE="JavaScript">
		function setCookie(name, value, expires, path, domain, secure) {
		if (!name || !value) return false;
		var str = name + \'=\' + encodeURIComponent(value);	
		document.cookie = str;
		return true;
		}
		setCookie("engNick","'.$name.'");
		setCookie("engPass","'.$pass.'");
		</SCRIPT>';
		$lastip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
		$query = "UPDATE ".self::$engine_tab_name."_users SET lastiplog='$lastip' WHERE username='$name'";
		mysql_query($query) or die(mysql_error());
		
    	engine::disconnectsql();
    	return "OK";
    }
    
    public static function logout() {
    	echo '<SCRIPT LANGUAGE="JavaScript">
		function setCookie(name, value, expires, path, domain, secure) {
		if (!name || !value) return false;
		var str = name + \'=\' + encodeURIComponent(value);
		
		document.cookie = str;
		return true;
		}
		setCookie("engNick","clear");
		setCookie("engPass","clear");
		</SCRIPT>';
		echo '<script>window.location="index.php";</script>';
    }

	public static function visitscount() {
		engine::connectsql();
		$visitscount = mysql_query("SELECT id FROM engine_visits WHERE username='".$_COOKIE['engNick']."'");
		$visitscount = mysql_numrows($visitscount);
		engine::disconnectsql();
		return $visitscount;
	}

	public static function edit($uid,$pass,$mail,$wmz){
		self::$err="";
    	if(!correct($pass)){ self::$err .= "Не правильно заполнено поле \"<b>Пароль</b>\"<br>";}
		if(!correctmail($mail)){ self::$err .= "Не правильно заполнено поле \"<b>Электронная почта</b>\"<br>";}
		if(!correct($wmz)){ self::$err .= "Не правильно заполнено поле \"<b>WMZ</b>\"<br>";}
    	if(self::$err){ return;  die();}
    	
		engine::connectsql();
		mysql_query("UPDATE ".self::$engine_tab_name."_users SET password='".$pass."' WHERE id='".$uid."'");
		mysql_query("UPDATE ".self::$engine_tab_name."_users SET email='".$mail."' WHERE id='".$uid."'");
		mysql_query("UPDATE ".self::$engine_tab_name."_users SET wmz='".$wmz."' WHERE id='".$uid."'");
		engine::disconnectsql();
		return 1;
	}
	
	public static function msg($to,$name,$msg,$time){
		self::$err="";
		$msg = correctmsg($msg);
		engine::connectsql();
		$addrt = mysql_query("INSERT INTO ".self::$engine_tab_name."_msg (`user`,`from`,`msg`,`time`) VALUES ('".$to."','".$name."','".$msg."','".$time."');") or die(mysql_error());
		engine::disconnectsql();
	}
	
	public static function advisited($adid){
		engine::connectsql();
		$queryvis = mysql_query("SELECT * FROM ".self::$engine_tab_name."_visits WHERE username='".self::$name."' and ident='$adid'"); # Проверка посещал ли юзер эту рекламу
		$rowvisc = mysql_num_rows($queryvis);
		engine::disconnectsql();
		if($rowvisc>0) return 1;
	}
	
	public static function addvisit($adid){
		engine::connectsql();
		$addvisit = mysql_query("INSERT ".self::$engine_tab_name."_visits (username,time,type,ident) VALUES ('".self::$name."','".time()."','serfurl','$adid')");
		engine::disconnectsql();
	}

	public static function addmoney(){
		engine::getpremium();
		engine::connectsql();
		if(user::$account=="") $money = "0.005"; else $money = engine::$premium[user::$account]['click'];
		$upduser = mysql_query("UPDATE engine_users SET money=money +$money WHERE username='".self::$name."'");
		engine::disconnectsql();
	}
	
	public static function addmoneytoref(){
		engine::getpremium();
		if(user::$referer!="") {
			engine::connectsql();
			$getreferer = mysql_query("SELECT * FROM engine_users WHERE username='".user::$referer."'");
			$getreferer = mysql_fetch_array($getreferer);
			if($getreferer['account']=="") $money="0.0025"; else $money=engine::$premium[$getreferer['account']]['refclick'];
			$upduser = mysql_query("UPDATE engine_users SET money=money +$money WHERE username='".user::$referer."'");
			engine::disconnectsql();
		}
	}
	
	public static function newmsg(){
		engine::connectsql();
		$msgnew="SELECT COUNT( * ) AS count FROM engine_msg WHERE ( user = '".self::$name."' AND new = '1' )";
		$msgnew=mysql_query($msgnew);
		$msgnew=mysql_fetch_array($msgnew);
		$msgnew=$msgnew['count'];
		self::$newmsgcount=$msgnew;
		if($msgnew>0) return 1;
		engine::disconnectsql();
	}

	public static function getrandomrefs($count){
		engine::connectsql();
		$re="";
		if(!correctmoney($count)) {return; die();}
		$sql = mysql_query("SELECT * FROM engine_users WHERE referer='' LIMIT 0,".$count."") or die(mysql_error());
		$rcount = mysql_num_rows($sql);
		while ($sql2 = mysql_fetch_array($sql)){
			 mysql_query("UPDATE engine_users SET referer='".self::$name."' WHERE username='".$sql2['username']."'") or die(mysql_error());  
		}
		mysql_query("UPDATE engine_users SET referals=referals+".$rcount." WHERE username='".user::$name."'") or die(mysql_error());
		return 1;
		#return $re."<br>Всего $rcount.<br>";
		engine::disconnectsql();
	}
}


?>