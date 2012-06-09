<?php
include ("funcs.php");
if(isset($_GET['id'])){ $refurl=refurl($_GET['id']);} else{$refurl="";};
#include("base/config.php");
#session_start();
#define('MAX_IDLE_TIME', 3);
#onlinecount();
# Меню
if(isset($_REQUEST['p']) && isset($_REQUEST['n'])) {
	$numb = $_REQUEST['n'];
	$page = correct($_REQUEST['p']);
}else{
	$page="home";
	$numb="0";
}
$pages_file = file_get_contents('base/p_'.$page.'/pages.txt');
$pages_file_arr = explode("\n", $pages_file);

$pages_title = file_get_contents('base/p_'.$page.'/titles.txt');
$pages_title_arr = explode("\n", $pages_title);

$p_count = count($pages_file_arr) - 1;
?>
<html>
<head><title>Российский серфинг спонсор </title>
<link href="img/style.css" type="text/css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<!-- jQuery -->
<script src="jquery.js" type="text/javascript"></script>
</head>
<body bgcolor="#f7f7f7">
<div class="login_s" style="-moz-opacity:0.50;filter:alpha(opacity=50);z-index: 2;background-color:white;opacity: 0.5;display:none;width:100%;height:100%;position:absolute;top:0;left:0;"></div>
<div class="reg_s" style="-moz-opacity:0.50;filter:alpha(opacity=50);z-index: 2;background-color:white;opacity: 0.5;display:none;width:100%;height:100%;position:absolute;top:0;left:0;"></div>
<div align="center">
<table class="bt"  cellpadding="0" cellspacing="0" width="1003px" height="100%" bgcolor="white" border="0px">
<tr>
<td width="1px" bgcolor="#dbdbdb"></td>
<td>
<!-- ################## -->


<table class="roottab" height="100%" cellpadding="0" cellspacing="0">
<tr>
	<td valign="top" class="lefttab" background="img/logoleft.gif" width="222px">
	<img src="img/s.gif" width="222px" height="1px">
	<!-- nen.leftmenu.begin -->
	<div class="leftmenu">
	<table class="fontmenu" cellpadding="0" cellspacing="0">
	<tr>
		<td class="actmi_0" <?=activemenu("home",0)?> width="16px"></td>
		<td class="actmi_1" <?=activemenu("home",1)?> ><a href="./?p=home&n=0<?=$refurl?>">Главная</a></td>
		<td class="actmi_0" <?=activemenu("home",2)?> width="16px"></td>
	</tr>
	<tr>
		<td class="actmi_0" <?=activemenu("workers",0)?> width="16px"></td>
		<td class="actmi_1" <?=activemenu("workers",1)?> ><a href="./?p=workers&n=0<?=$refurl?>">Сотрудникам</a></td>
		<td class="actmi_0" <?=activemenu("workers",2)?> width="16px"></td>
	</tr>
	<tr>
		<td class="actmi_0" <?=activemenu("reklamodat",0)?> width="16px"></td>
		<td class="actmi_1" <?=activemenu("reklamodat",1)?> ><a href="./?p=reklamodat&n=0<?=$refurl?>">Рекламодателям</a></td>
		<td class="actmi_0" <?=activemenu("reklamodat",2)?> width="16px"></td>
	</tr>
	<tr>
		<td class="actmi_0" <?=activemenu("forum",0)?> width="16px"></td>
		<td class="actmi_1" <?=activemenu("forum",1)?> ><a href="http://forum.rubux.ru/">Форум</a></td>
		<td class="actmi_0" <?=activemenu("forum",2)?> width="16px"></td>
	</tr>
	<tr>
		<td class="actmi_0" <?=activemenu("contact",0)?> width="16px"></td>
		<td class="actmi_1" <?=activemenu("contact",1)?> ><a href="./?p=contact&n=0<?=$refurl?>">Связь</a></td>
		<td class="actmi_0" <?=activemenu("contact",2)?> width="16px"></td>
	</tr>
	</table>
	</div>
	<!-- nen.leftmenu.end -->
	</td>
	<td width="10px"><img src="img/s.gif" width="10px" height="1px"></td>
	
	<td valign="top" width="560px">
	<img src="img/s.gif" width="560px" height="1px">
	<div class="centdiv">
	<table width="550px" cellpadding="0" cellspacing="0">
	
	<tr>
	<td valign="top" height="220px">
	<!-- nen.adblock.begin -->
	<table height="100%" width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" valign="top" style="padding: 10 0 0 0;">
	Пользователей всего: <?php
	engine::connectsql();
	$sql = mysql_query("SELECT COUNT(*) as count FROM engine_users");
	$sql = mysql_fetch_array($sql);
	engine::disconnectsql();
	echo $sql['count']; ?><br>
	
	</td>
	<td id="zakaz" align="right" valign="top">
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="140" height="200" id="Untitled-1" align="top">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="movie" value="banner_zakaz.swf" />
	<param name="menu" value="false" />
	<param name="quality" value="best" />
	<param name="scale" value="noscale" />
	<param name="bgcolor" value="#ffffff" />
	<embed src="banner_zakaz.swf" menu="false" quality="best" scale="noscale" bgcolor="#ffffff" width="140" height="200" name="banner_zakaz.swf" align="top" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
	</div>
	</td>
	</tr>
	</table>
	
	<!-- nen.adblock.end -->
	</td></tr>
	
	<tr>
	<td>
	
	<table class="fontmenu2" cellpadding="0" cellspacing="0">
		<tr>
			<?php
			for($i=0; $i<$p_count; $i++) {
				if($i!=$numb) $activity="_na"; else $activity="";
				echo '<td background="img/l_tab'.$activity.'.gif" width="5" height="22"><img src="img/s.gif" width="5"></td>';
				echo '<td background="img/tab'.$activity.'.gif"><center><a href="./?p='.$page.'&n='.$i.$refurl.'">'.$pages_file_arr[$i].'</a></center></td>';
				echo '<td background="img/r_tab'.$activity.'.gif" width="5" height="22"><img src="img/s.gif" width="5"></td>';
				echo '<td>&nbsp;</td>';
			}
				#echo '<td><img src="img/spacer.gif" width="26" height="24"></td>';
			?>
			<td>&nbsp;</td>
		</tr>
	</table>
	
	<table class="fontmenu" width="100%" cellpadding="0" cellspacing="0">
	<tr><td colspan="100" background="img/dtab.gif" height="3px"></td></tr>
	<tr>
		<td>
		<!-- nen.h.begin -->
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td background="img/bord_rm.gif" width="2px" height="30px"></td>
		<td background="img/bord_dm.gif" width="546px" height="30px">&nbsp;&nbsp;<font class="hem"><?=$pages_title_arr[$numb] ?></font></td>
		<td background="img/bord_dm.gif" align="right"><a href="javascript:history.back();">Назад</a>&nbsp;&nbsp;</td>
		<td background="img/bord_rm.gif" width="2px" height="30px"></td>
		</tr>
		</table>
		<!-- nen.h.end -->
		</td>
	</tr>
	</table>
	
	
	<!-- nen.mid.b -->
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr><td bgcolor="#f7f7f7">
	<table class="ttext" width="100%" height="300px" cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/t_tl.gif" width="2px"></td>
	<td id="t_text" valign="top" background="img/t_bg.gif">
	<?php
		if(isset($page)) $inc_numb_page='base/p_'.$page.'/page_'.$numb.'.php';
		else $inc_numb_page='base/p_'.$page.'/page_'.$numb.'.php';
		 include($inc_numb_page);
	?>
	</td>
	<td background="img/t_tr.gif" width="2px"></td>
	</tr>
	</table>
	</td></tr>
	<tr>
	<td>
	
	<table width="100%" height="48px" cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/t_d1.gif" width="30px"></td>
	<td background="img/t_d2.gif" width="510px" id="crt" align="right">© 2008 RuBux.ru Все права защищены. All Rights Reserved.</td>
	<td background="img/t_d3.gif" width="10px"></td></tr>
	</table>
	<br><br>
	<table align="center"><tr><td>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='http://counter.yadro.ru/hit?t12.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: показано число просмотров за 24"+
" часа, посетителей за 24 часа и за сегодня' "+
"border=0 width=88 height=31><\/a>")//--></script><!--/LiveInternet-->
</td>
<td>&nbsp;
<!--Rating@Mail.ru COUNTER--><script language="JavaScript"
type="text/javascript"><!--
d=document;var a='';a+=';r='+escape(d.referrer)
js=10//--></script><script language="JavaScript1.1"
type="text/javascript"><!--
a+=';j='+navigator.javaEnabled()
js=11//--></script><script language="JavaScript1.2"
type="text/javascript"><!--
s=screen;a+=';s='+s.width+'*'+s.height
a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth)
js=12//--></script><script language="JavaScript1.3"
type="text/javascript"><!--
js=13//--></script><script language="JavaScript"
type="text/javascript"><!--
d.write('<a href="http://top.mail.ru/jump?from=1446110"'+
' target="_top"><img src="http://d0.c1.b6.a1.top.list.ru/counter'+
'?id=1446110;t=136;js='+js+a+';rand='+Math.random()+
'" alt="Рейтинг@Mail.ru"'+' border="0" height="40" width="88"/><\/a>')
if(11<js)d.write('<'+'!-- ')//--></script><noscript><a
target="_top" href="http://top.mail.ru/jump?from=1446110"><img
src="http://d0.c1.b6.a1.top.list.ru/counter?js=na;id=1446110;t=136"
border="0" height="40" width="88"
alt="Рейтинг@Mail.ru"/></a></noscript><script language="JavaScript"
type="text/javascript"><!--
if(11<js)d.write('--'+'>')//--></script><!--/COUNTER-->
</td><td><a href="http://whos.amung.us/show/00yhur5i"><img src="http://whos.amung.us/cwidget/00yhur5i/f99d34000000.png" alt="visitor stats" width="81" height="29" border="0" /></a></td>
</tr></table>

	</td>
	</tr>
	</table>
	<br><br>
	<!-- nen.mid.end -->
	
	
	</td>
	</tr>
	
	</table>
	</div>
	
	</td>
	<td valign="top" width="215px">
	<!-- nen.rightmenu.begin -->
	<script>
  	$(document).ready(function(){
		$("#login").click(function () {$(".login_s").fadeIn("slow");});
		$("#reg").click(function () {$(".reg_s").fadeIn("slow");});
		$("#login_close").click(function () {$(".login_s").fadeOut("slow");});    
		$("#reg_close").click(function () {$(".reg_s").fadeOut("slow");});   
	});
	</script>
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td width="3px" background="img/bord_wshad.gif"></td>
	
	<?php if(user::auth()){ 
	if(user::newmsg()) {$msgnew="<b>".user::$newmsgcount."</b>";}else{ $msgnew=0;}
	?>
	<td height="20px" valign="top" align="left" style="padding: 5 10 10 10">
	Пользователь: <b><?=user::$name?></b><br>
	Уровень: <b><?php engine::getpremium(); if(user::$account=="") echo "<b>Стандарт</b>"; else echo "<b>".user::$account."</b>"; ?></b><br>
	Баланс: <b><?=user::money()?>$</b><br>
	Рефералов: <b><?=user::refcount()?></b><br><br>
	<a href="./?p=panel_ank&n=0">Анкета</a> | <a href="./?p=panel_msg&n=0">Сообщения (<?=$msgnew?>)</a><br><br>
	<a href="./?p=panel_balance&n=0">Пополнить баланс</a><br><br>
	<a href="./?p=panel_refs&n=0">Список рефералов</a><br>
	<a href="./?p=panel_buyrefs&n=0">Покупка рефералов</a><br>
	<a href="./?p=reklamodat&n=0">Заказ рекламы</a><br><br>
	<a href="./?p=panel_lvl&n=0">Премиум</a><br>
	<a href="./?p=panel_payout&n=0">Вывод заработка</a><br>
	<br><a href="./?p=developers&n=0">Журнал разработчиков</a><br>
	<div align="right"><a href="./?p=login&n=0&exit">Выход</a></div>
	</td>
	<? }else{ ?>
	<td height="20px" bgcolor="#f3bf4b" valign="middle" align="center">
	<a href="#" id="login"><font color="white"><b>Вход</b></font></a>
	</td>
	<?php } ?>
	</tr>
	<tr><td width="3px" background="img/bord_wshad.gif"></td><td bgcolor="#92a1ad" height="1px"></td></tr>
	<tr><td width="3px" background="img/bord_wshad.gif"></td>
	<td align="center"><div align="left">&nbsp;Быстрый переход:</div>
	&nbsp;<a href="./?p=panel_buyrefs&n=0"><img src="img/ico_find.gif"></a>&nbsp;<a href="./?p=panel_msg&n=0"><img src="img/ico_email.gif"></a>&nbsp;<a href="./?p=panel_balance&n=0"><img src="img/ico_hb.gif"></a>&nbsp;<a href="./?p=home&n=4"><img src="img/ico_book.gif"></a>
	</td></tr>
	<tr><td width="3px" background="img/bord_wshad.gif"></td><td bgcolor="#92a1ad" height="1px"></td></tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr><td><a href="#" id="reg">
	<?php if(user::auth()){ ?>
	<img src="img/rm_regbtn_ifauth.gif">
	<? }else{ ?>
	<img src="img/rm_regbtn.gif">
	<?php } ?>
	</a></td></tr>
	</table>
	
	<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
	<td width="100%" align="right" valign="top" style="padding: 110 40 0 0">
	
	
	
	</td>
	</tr>
	</table>
	
	<div class="login_s" style="z-index: 3;display:none;width:300px;height:220px;position:absolute;top:50%;left:50%;margin-top:-110px;margin-left:-150px;">
	<form action='./' method='GET'>
	<input type="hidden" name="p" value="login" />
	<input type="hidden" name="n" value="0" />
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/login_1.gif" width="10px" height="10px"></td>
	<td background="img/login_2.gif" width="280px" height="10px"></td>
	<td background="img/login_3.gif" width="10px" height="10px"></td>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/login_4.gif" width="1px" height="205px"></td>
	<td valign="top" background="img/login_5.gif" width="298px" height="205px">
	<div align="right"><a href="#" id="login_close">Закрыть</a>&nbsp;&nbsp;&nbsp;</div><br>
	<center>
	<b>Логин</b><br><br>
	<input class="outfrm" name='username' autocomplete="off" type="text" size=16 maxlength="14" style="background-image: url('img/inp_user.gif');background-repeat:no-repeat;background-attachment: scroll;background-position: 0px center;padding-left: 18px;"><br><br>
	<b>Пароль</b><br><br>
	<input class="outfrm" type="password" name='password' autocomplete="off" size=16 maxlength="14" style="background-image: url('img/inp_userpass.gif');background-repeat: no-repeat;background-attachment: scroll;background-position: 0px center;padding-left: 18px;">
	<br><br><br><input class="outfrm" type="image" src="img/form_btn_enter.gif" value="Войти" class="submit"><br>
	</center>
	</td>
	<td background="img/login_6.gif" width="1px" height="178px"></td></tr>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/login_7.gif" width="10px" height="10px"></td>
	<td background="img/login_8.gif" width="280px" height="10px"></td>
	<td background="img/login_9.gif" width="10px" height="10px"></td>
	</tr>
	</table>
		</form>
	</div>

	<div class="reg_s" style="z-index: 3;display:none;width:300px;height:220px;position:absolute;top:50%;left:50%;margin-top:-110px;margin-left:-150px;">
	<form action='./' method='GET'>
	<input type="hidden" name="p" value="login" />
	<input type="hidden" name="n" value="1" />
	<input type="hidden" name="ref" value="<?=$_GET['id'] ?>" />
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/login_1.gif" width="10px" height="10px"></td>
	<td background="img/login_2.gif" width="280px" height="10px"></td>
	<td background="img/login_3.gif" width="10px" height="10px"></td>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/login_4.gif" width="1px" height="205px"></td>
	<td valign="top" background="img/login_5.gif" width="298px" height="205px">
	<div align="right"><a href="#" id="reg_close">Закрыть</a>&nbsp;&nbsp;&nbsp;</div><br>
	<center>
	<table width="93%" cellpadding="0" cellspacing="0">
	<tr><td width="50%">Логин:</td><td width="50%"><input name='username' class="outfrm" type="text" maxlength="12" style="background-image: url('img/inp_user.gif');background-repeat:no-repeat;background-attachment: scroll;background-position: 0px center;padding-left: 18px;"></td></tr>
	<tr><td>Пароль:</td><td><input name='password' class="outfrm" type="password" maxlength="14" style="background-image: url('img/inp_userpass.gif');background-repeat: no-repeat;background-attachment: scroll;background-position: 0px center;padding-left: 18px;"></td></tr>
	<tr><td>Повторите пароль:</td><td><input name='password2' class="outfrm" type="password" maxlength="14" style="background-image: url('img/inp_userpass.gif');background-repeat: no-repeat;background-attachment: scroll;background-position: 0px center;padding-left: 18px;"></td></tr>
	<tr><td>Эл. почта:</td><td><input name='email' class="outfrm" type="text" maxlength="20" style="padding-left: 18px;"></td></tr>
	<tr><td>WMZ кошелек:</td><td><input name='koshel' class="outfrm" type="text" maxlength="18" style="padding-left: 18px;"></td></tr>
	</table><br><br>
	<center><input class="outfrm" type="image" src="img/form_btn_reg.gif" value="Войти" class="submit">
	<br>(перед регистрацией ознакомьтесь с <a href="./?p=home&n=4">правилами</a>)
	</center>
	</center>
	</td>
	<td background="img/login_6.gif" width="1px" height="178px"></td></tr>
	</tr>
	</table>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td background="img/login_7.gif" width="10px" height="10px"></td>
	<td background="img/login_8.gif" width="280px" height="10px"></td>
	<td background="img/login_9.gif" width="10px" height="10px"></td>
	</tr>
	</table>
		</form>
	</div>
	<!-- nen.rightmenu.end -->
	</td>
</tr>

</table>
<!-- ################## -->


</td>
<td width="1px" bgcolor="#dbdbdb"></td>
</tr>
</table>

</div>



</body></html>