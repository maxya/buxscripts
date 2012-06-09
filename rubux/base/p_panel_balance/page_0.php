<?php if(user::auth()){ ?>
На вашем балансе: <b><?=user::$money ?>$</b><br/>

<?php
if(isset($_GET['add']) && isset($_GET['count'])){
	if(correctmoney($_GET['count'])){
		echo "<br>Вам нужно оплатить: <b>".$_GET['count']."$</b><br><br>";
		$mrh_login = "rubuxone";
        $topay=$_GET['count'];
        $mrh_pass1 = "rg4hy52hj7";  //пароль1
        //параметры магазина 
        $inv_id = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); //номер счета
        //описание покупки
        engine::connectsql();
        mysql_query("INSERT INTO engine_getpay (`username`, `check`) VALUES ('".user::$name."','".$inv_id."')");
        engine::disconnectsql();
        $inv_desc = "RuBux: balance add - ".$_GET['count']; 
        $out_summ = $topay; //сумма покупки
        $shp_item = user::$id; // тип товара

        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:shp_item=$shp_item"); //вывод HTML страницы с кассой
        echo "<table width=\"100%\" align=\"center\"><tr><td width=\"100%\" align=\"center\">";
        echo "<script language=JavaScript ". "src='http://www.roboxchange.com/mrh_summpreview.asp?". "mrh=$mrh_login&out_summ=$out_summ&inv_id=$inv_id&inv_desc=$inv_desc". "&crc=$crc&shp_item=$shp_item'></script>";
        echo "</td></tr></table>";
        
		#echo '<a href="wmk:payto?Purse='.engine::$conf_wmz.'&Amount='.$_GET['count'].'&Desc=RuBux.пополнение.балса.('.user::$name.')&BringToFront=Y"><img src="img/btn_pay.gif" width="73" height="20"></a>';
	}else{
		echo "<b>Не верное количество";
	}
}else{

?>
<form action='./' method='GET'>
		<input type="hidden" name="p" value="panel_balance" />
		<input type="hidden" name="n" value="0" />
		<input type="hidden" name="add" value="t" />
<br>Пополнить баланс:&nbsp;&nbsp;<input type='text' style="text-align: center;" class="text" size='10' maxlength='6' name='count' autocomplete="off" value="" tabindex="1" /> $
<br><br><input type="image" src="img/btn_zakaz.gif" value="Заказать"/></form><br><br>







<?php }} ?>