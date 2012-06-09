<?php if(user::auth()){ 
engine::getpremium();
if(isset($_GET['premadd'])){
	if(user::$account==""){ $ibuy="Silver";}
	if(user::$account=="Silver"){ $ibuy="Gold";}
	if(user::$account=="Gold"){ $ibuy="Platinum";}
	if(user::$account=="Platinum"){ $ibuy="";}
	if($ibuy!=""){
		if(user::$money >= engine::$premium[$ibuy]['price']) {
			engine::connectsql();
			mysql_query("UPDATE engine_users SET money=money-".engine::$premium[$ibuy]['price']." WHERE username='".user::$name."'  ") or die(mysql_error());
			mysql_query("UPDATE engine_users SET account='".$ibuy."' WHERE username='".user::$name."'") or die(mysql_error());
			echo "Вы успешно подняли свой уровень до: <b>$ibuy</b>";
			user::getrandomrefs(engine::$premium[$ibuy]['refs']);
	#mysql_query("INSERT INTO engine_premium (`user`) VALUES ('".user::$name."');") or die(mysql_error());
	#mysql_query("INSERT INTO engine_msg (`user`,`from`,`msg`,`time`) VALUES ('".user::$name."', '#adm#', '<b>Заказ премиума</b> - ваш заказ обработан, <a href=\"./?p=panel_lvl&n=0\">[оплатите]</a> цену премиум аккаунта.','".time()."');") or die(mysql_error());
	#echo "Ваш запрос отправлен. ";
	#echo "Для подключения премиум режима вам нужно оплатить $premium_price$<br>";
			engine::disconnectsql();
		}else{
			echo "Не достаточно денег на балансе.";
		}
	}else{
		echo "Ваш уровень <b>Premium</b>, у вас максимальный уровень!";
	}
}else{
	?>
	В нашей системе вы можете приобрести 3 вида улучшенного сотрудничества.<br><br>
	Премиум - <?=engine::$premium['Silver']['name']?> (Ваш клик: 0.006$, клик реферала: 0.0035$, минималка 15$, выплата 1 и 15 числа)<br> Стоимость <?=engine::$premium['Silver']['price']?>$
	&nbsp;+подарок <b><?=engine::$premium['Silver']['refs']?></b> активных рефералов<br><br>
	
	Премиум - <?=engine::$premium['Gold']['name']?> (Ваш клик: 0.008$, клик реферала: 0.0045$, минималка 10$, выплата 1 и 15 числа)<br> Стоимость <?=engine::$premium['Gold']['price']?>$
	&nbsp;+подарок <b><?=engine::$premium['Gold']['refs']?></b> активных рефералов<br><br>
	
	Премиум - <?=engine::$premium['Platinum']['name']?> (Ваш клик: 0.01$, клик реферала: 0.006$, минималка 1$, выплата по требованию)<br> Стоимость <?=engine::$premium['Platinum']['price']?>$
	&nbsp;+подарок <b><?=engine::$premium['Platinum']['refs']?></b> активных рефералов<br><br>
	(У премиум пользователей есть специальная зона с дополнительными ссылками) 
	<br>
	<?php 
	if(user::$account=="") echo 'У вас стандартный уровень, сейчас вам доступен уровень <b>Silver</b><br><br>&nbsp;&nbsp;<a href="?p=panel_lvl&n=0&premadd"><img src="img/btn_buy.gif" /></a>'; 
	if(user::$account=="Silver") echo 'Ваш уровень <b>Silver</b>, сейчас вам доступен уровень <b>Gold</b><br><br>&nbsp;&nbsp;<a href="?p=panel_lvl&n=0&premadd"><img src="img/btn_buy.gif" /></a>';
	if(user::$account=="Gold") echo 'Ваш уровень <b>Gold</b>, сейчас вам доступен уровень <b>Platinum</b><br><br>&nbsp;&nbsp;<a href="?p=panel_lvl&n=0&premadd"><img src="img/btn_buy.gif" /></a>';
	if(user::$account=="Platinum") echo 'Ваш уровень <b>Platinum</b>, у вас максимальный уровень!';

}} ?>