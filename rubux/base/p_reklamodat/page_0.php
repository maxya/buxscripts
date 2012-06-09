<?php if(user::auth()){
engine::connectsql();

if(isset($_REQUEST["url"]))
{$balance = mysql_query("SELECT * FROM engine_users WHERE username='".user::$name."'");
$balance = mysql_fetch_array($balance);
    $f_descr = correctmsg($_REQUEST["description"]);
    $f_url = correcturl($_REQUEST["url"]);
    $f_email = correctmail($_REQUEST["email"]);
    $f_plan = correct($_REQUEST["plan"]);
	$topay = $f_plan / 1000 * 2;
    if($f_descr==NULL|$f_url==NULL|$f_email==NULL|$balance['money']<$topay) {
   echo "Не все поля правильно заполнены, либо недостаточно денег на счету для выполнения заказа.";
    }else{
        #echo "wmz: $f_wmz, descr: $f_descr, url: $f_url, email: $f_email, plan: $f_plan.";
mysql_query("UPDATE engine_users SET money=money-$topay WHERE username='".user::$name."';") or die(mysql_error());
        $query = "INSERT INTO engine_ads_q (descr, url, email, plan, topay, adtype) VALUES('$f_descr','$f_url','$f_email','$f_plan','$topay','surf')";
        mysql_query($query) or die(mysql_error());

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