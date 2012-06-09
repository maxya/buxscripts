<html><body>
<?php
include ("../../funcs.php");
if(!isset($_GET['verify'])){echo '<font style="font-family: Tahoma;font-size: 12;"><b>Ошибка</b>'; exit();}
$ad=correct($_GET["ad"]);
if(user::auth()){
	$ad=correct($_GET["ad"]);
 	if(!engine::adexist($ad)){echo '<font style="font-family: Tahoma; font-size: 12;"><b>Ошибка:</b> Cсылки не существует'; exit();}
 	if(user::advisited($ad)){echo '<font style="font-family: Tahoma; font-size: 12;"><b>Ошибка:</b> Вы уже посещали эту страницу'; exit();}
 	engine::connectsql();
	$sql = mysql_query("SELECT time FROM engine_visits WHERE username='".user::$name."' ORDER BY time DESC");
	#echo "tt";
	$sql = mysql_fetch_array($sql);
	$time = time();
	if($sql['time']+15>=$time){echo '<font style="font-family: Tahoma; font-size: 12;"><b>Ошибка:</b> Запрещено просматривать сразу нескольно страниц'; exit();}
	engine::disconnectsql();
	user::addvisit($ad);
	user::addmoney();
	user::addmoneytoref();
	engine::refreshadcount("members",$ad);
}else{
    engine::refreshadcount("outside",$ad);
} ?>
<b>Спасибо</b> за посещение страницы!
</body></html>