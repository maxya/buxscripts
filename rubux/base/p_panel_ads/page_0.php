<?php if(user::auth()){ ?>
Извините, данная функция в разработке, перейдите в <a href="./?p=developers&n=0">"Журнал разработчиков"</a> для просмотра.
<?php

/*
if(isset($_REQUEST["url"]))
{
    $sys_wmz = "ВНУТРЕННИЙ ЗАКАЗ";
    $f_wmz = $_REQUEST["wmz"];
    $f_descr = $_REQUEST["description"];
    $f_url = $_REQUEST["url"];
    $f_email = $_REQUEST["email"];
    $f_plan = $_REQUEST["plan"];
    if($f_wmz==NULL|$f_descr==NULL|$f_url==NULL|$f_email==NULL) {
        echo "Не все поля заполнены.<br><br><a href=\"javascript:history.back();\">Назад</a>";
    }else{
        $topay = $f_plan / 100;
        #echo "wmz: $f_wmz, descr: $f_descr, url: $f_url, email: $f_email, plan: $f_plan.";
        $accmoney = mysql_query("SELECT * FROM engine_user WHERE username='".$_COOKIE['engNick']."'");
        #mysql_query("UPDATE engine_users SET account='premium' WHERE username='".$_GET['payed']."'");
        $query = "INSERT INTO engine_ads_q (wmz, descr, url, email, plan, topay, adtype) VALUES('$f_wmz','$f_descr','$f_url','$f_email','$f_plan','$topay','surf')";
        mysql_query($query) or die(mysql_error());

        echo 'Спасибо за заказ рекламы! Оплатите рекламу через систему WebMoney.';
        $wm_msg = "Заказ.посещений.".$f_url.".в.количестве.".$f_plan;
        echo '<br><br><a href="wmk:payto?Purse='.$sys_wmz.'&Amount='.$topay.'&Desc='.$wm_msg.'&BringToFront=Y"><img src="img/btn_pay.gif" width="93" height="20"></a>';
        

    }
}else{

?>
<form action='./' method='POST'>
<input type="hidden" name="page" value="reklamodat" />
<input type="hidden" name="numb" value="0" />
<table>
<tr><td>
<fieldset>
<legend>&nbsp;Заказ рекламы&nbsp;</legend>
Оплата рекламы происходит с вашего счета

<table class="formtab" width="300" border="0" align="center">
    <tr>
        <td width="150" align="left"><br><label>Текст/Описание ссылки</label></td>
    	<td width="150" align="left"><br><input type='text' class="text" size='15' maxlength='100' name='description' autocomplete="off" value="" tabindex="2" /></td>
    </tr>
     <tr>
        <td width="150" align="left"><br><label>Ссылка</label></td>
    <td width="150" align="left"><br><input type='urlp' size='15' class="text"  maxlength='150' name='url' autocomplete="off" value="" tabindex="3" /></td>
    </tr>
    <tr>
        <td width="150" align="left"><br><label>План</label></td>
        <td width="150" align="left"><br>
        
        
        <select name="plan" class="text" tabindex="4" />

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='500'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='1000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='2000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='3000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='5000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='10000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='20000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='30000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='50000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

<option value="<?
require('./base/config.php');
$sql = "SELECT * FROM engine_config WHERE name='hits' and howmany='100000'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["howmany"];

?>"><?= $row["howmany"] ?> Посещений <?= $row["value"]*1.5 ?>$</option>

</select>
        
        
        </td>
    </tr>

    <tr>
        <td width="150">&nbsp;&nbsp;</td>
        <td width="250" align="left"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;
        <input type="image" src="img/btn_q.gif" value="Заказать" class="submit" tabindex="6" />
        </td>
    </tr>



</table>

</fieldset>
</td></tr>
</table>
</form>
<?php } ?>


</td></tr></table>
*/
 } ?>