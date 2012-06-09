<?php include ('header.php'); 

?>


<h3>Хотите заработать?</h3>

<p><img class="img-left" src="images/users.png" width="48" height="48" alt="Image" />
Вы хотите заработать в Интернете деньги, но не знаете как? Мы вам поможем! С помощью системы <? include('sitename.php'); ?>
вы можете заработать деньги, не прилагая для этого больших усилий. Это очень легко! Вам не нужно иметь каких-либо специальных знаний. Вам просто нужно просматривать сайты наших спонсоров.
 <span class="highlight">Если вы хотите зарабатывать большее количество денег, то направляйте к нам своих друзей и знакомых. </span>
 Заработанные деньги выплачиваются каждый день через платёжную систему WebMoney. Минимальная сумма выплаты $<? require ('config.php');

								$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"];
								mysql_close($con); ?> Начните зарабатывать деньги прямо сейчас!</p>

<p align="right"><?php echo "<a href=\"register.php?r=".$elref."\">";?>Регистрация!</a></p>

<h3>Эффективная реклама</h3>

<p><img class="img-left" src="images/money.gif" width="48" height="48" alt="Image" />

 У вас есть интересный проект, но нет посетителей? Вы хотите рекламировать ваши товары и услуги? Мы поможем вам. С помощью системы  <? include('sitename.php'); ?> настройте показы ваших сайтов и вам обеспечен быстрый приток заинтересованных посетителей. Вы, например, можете оплатить всего  $<?
								require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"]; mysql_close($con);?> 
								за <? require ('config.php');
							 	$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result);echo $row["howmany"]; mysql_close($con);?> 
							уникальных визитов на ваш сайт, при этом каждый визит на ваш сайт длится не менее 20 секунд. После простой регистрации мы проверим ваш сайт и в течение 10 часов активируем его. Вам не нужно иметь у нас учётной записи, вам нужно просто заполнить форму и оплатить выбранное количество посетителей. Вся статистика посещения вашего сайта будет видна на странице "Просмотр рекламы". Регистрируйтесь и заставьте ваш сайт быть нужным и эффективным!</p>
<p align="right"><?php echo "<a href=\"advertise.php?r=".$elref."\">";?>Заказать рекламу...</a></p>


<?					require ('config.php');
					$sqlzdu = "SELECT * FROM tb_config WHERE item='referalclick' and howmany='1'";
					$resultzdu = mysql_query($sqlzdu);        
					$myrowzdu = mysql_fetch_array($resultzdu);
					$elprecioref=$myrowzdu["price"];

					$sqlzduz = "SELECT * FROM tb_config WHERE item='click' and howmany='1'";
					$resultzduz = mysql_query($sqlzduz);        
					$myrowzduz = mysql_fetch_array($resultzduz);
					$elprecioa=$myrowzduz["price"];

					$elprecio=$elprecioa*10;
					$cien=$elprecioref*100*10;
					$daily=$elprecio+$cien;
					$monthly=$daily*30;
					$yearly=$monthly*12;
					mysql_close($con);

				?>

<p>&nbsp;</p>
<blockquote><h4>Сколько я заработаю?</h4>

Если вы кликните по 10 рекламам в день, и привлечете 100 рефералов которые кликают по 10 рекламам, вы сможете заработать  $<?php echo $monthly?> в месяц, и $<?php echo $yearly ?> в год!</blockquote>





<?php include ('footer.php'); ?>
