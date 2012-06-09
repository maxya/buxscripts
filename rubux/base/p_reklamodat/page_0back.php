<?php if(user::auth()){
engine::connectsql();

if(isset($_REQUEST["url"]))
{
	$q = mysql_query("SELECT * FROM engine_config WHERE name='wmz'") or die(mysql_error());
	$wmz = mysql_fetch_array($q);
    $sys_wmz = $wmz['value'];
    $f_wmz = correct($_REQUEST["wmz"]);
    $f_descr = correctmsg($_REQUEST["description"]);
    $f_url = correcturl($_REQUEST["url"]);
    $f_email = correctmail($_REQUEST["email"]);
    $f_plan = correct($_REQUEST["plan"]);
    if($f_wmz==NULL|$f_descr==NULL|$f_url==NULL|$f_email==NULL) {
        echo "Не все поля правильно заполнены.";
    }else{
        $topay = $f_plan / 1000 * 2;
        #echo "wmz: $f_wmz, descr: $f_descr, url: $f_url, email: $f_email, plan: $f_plan.";

        $query = "INSERT INTO engine_ads_q (wmz, descr, url, email, plan, topay, adtype) VALUES('$f_wmz','$f_descr','$f_url','$f_email','$f_plan','$topay','surf')";
        mysql_query($query) or die(mysql_error());

        #echo 'Спасибо за заказ рекламы! Оплатите рекламу через систему WebMoney.';
        #$wm_msg = "Заказ.посещений.".$f_url.".в.количестве.".$f_plan;
        #echo '<br><br><a href="wmk:payto?Purse='.$sys_wmz.'&Amount='.$topay.'&Desc='.$wm_msg.'&BringToFront=Y"><img src="img/btn_pay.gif" width="93" height="20"></a>';
        
        $mrh_login = "rubuxone";
        //логин 
        $mrh_pass1 = "rg4hy52hj7";  //пароль1
        //параметры магазина 
        $inv_id = 0; //номер счета
        //описание покупки
        $inv_desc = "RuBux: pokupka poseshenij v rasmere - ".$f_plan; 
        $out_summ = $topay; //сумма покупки
        $shp_item = 1; // тип товара

        $crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:shp_item=$shp_item"); //вывод HTML страницы с кассой
        echo "<script language=JavaScript ". "src='http://www.roboxchange.com/mrh_summpreview.asp?". "mrh=$mrh_login&out_summ=$out_summ&inv_id=$inv_id&inv_desc=$inv_desc". "&crc=$crc&shp_item=$shp_item'></script>";
        #echo htmlspecialchars($printz);

    }
}else{
?>
- Внесение сайта в систему RuBux.ru для показа посетителям очень выгодно.<br>
- Мы взымаем $2 за 1000 кликов.<br>
- Мы гарантируем что посетитель задержится у вас на сайте не менее чем на 15 секунд.<br>
- Мы проверим вашу ссылку и она будет активирована в ближайшее время.<br>
- Мы гарантируем, что посетители будут только уникальные.<br>
<br>
<br>
<form action='./' method='POST'>
<input type="hidden" name="p" value="reklamodat" />
<input type="hidden" name="n" value="0" />

<!-- <img src="img/btn_zakaz.gif" id="btn_zakaz">  -->

<table class="formtab" width="100%" border="0" align="center">
    <tr>
        <td width="50%" align="left"><label>WMZ Кошелек</label></td>
        <td align="left"><input type='text' size='26' maxlength='100' name='wmz' autocomplete="off" value="" tabindex="1" /></td>
    </tr>
    <tr>
        <td align="left"><br><label>Текст/Описание ссылки</label></td>
    	<td align="left"><br><input type='text' size='26' maxlength='100' name='description' autocomplete="off" value="" tabindex="2" /></td>
    </tr>
     <tr>
        <td align="left"><br><label>Ссылка</label></td>
    	<td align="left"><br><input type='text' size='26' maxlength='150' name='url' autocomplete="off" value="" tabindex="3" /></td>
    </tr>
    <tr>
        <td align="left"><br><label>E-mail</label></td>
        <td align="left"><br><input type='text' size='26' maxlength='25' name='email' autocomplete="off" value="" tabindex="4" /></td>
    </tr>
    <tr>
        <td align="left"><br><label>План</label></td>
        <td align="left"><br>
        
        
        <select name="plan" class="text" tabindex="4" />

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='500'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='1000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='2000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='3000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='5000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='10000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='20000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='30000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='50000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

<option value="<?
engine::connectsql();
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='100000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
engine::disconnectsql();
echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений $<?= $row["value"] ?></option>

</select>
        
        
        </td>
    </tr>

    <tr>
        <td width="150">&nbsp;&nbsp;</td>
        <td width="250" align="left"><br>
        <input type="image" src="img/btn_zakaz.gif" value="Заказать" class="submit" tabindex="6" />
        </td>
    </tr>



</table>
</form>


<?php
}}else{?>Для того чтобы заказать рекламу на нашем сайте вам необходимо <a href="#" id="reg">зарегистрироваться</a> и войти в аккаунт.<? }
?>