<?php include ('header.php'); 

?>


<h3>Join Now and Get Paid to Visit Websites!</h3>

<p><img class="img-left" src="images/users.png" width="48" height="48" alt="Image" />
At <? include('sitename.php'); ?>, you get paid to click on ads and visit websites. The process is easy! You simply click a link and view a website for a few seconds to earn money. You don't need any skills. This is because all you need to do is visit the sites we provide you with. <span class="highlight">You can earn even more by referring friends.</span> Payment requests can be made every day and are processed through AlertPay. The minimum payout is $<? require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"];
								mysql_close($con); ?></p>
<p align="center"><a href='http://www.alertpay.com/?WK5UIa9a%2bSE0Ex43LT9K8Q%3d%3d' target="_blank"><img src=http://www.alertpay.com/banners/ban_21.gif border=0></a></p>

<p align="right"><?php echo "<a href=\"register.php?r=".$elref."\">";?>Join Now!</a></p>

<h3>Advertise Here</h3>

<p><img class="img-left" src="images/money.gif" width="48" height="48" alt="Image" />

Setting up and displaying your link for <? include('sitename.php'); ?> members to visit is fast and simple. We charge $<? 
								require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"]; mysql_close($con);?> 
								per <? require ('config.php');
							 	$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result);echo $row["howmany"]; mysql_close($con);?> 
								member visits and each visit will last at least 30 seconds. 
								Outside visits are unlimited and included within the price.
								We will review your website and will have it active within 24 hours. You don’t need an account to order advertising at <?php include ('sitename.php');?>, you simply need to complete the form then pay the fee. If you would like a large package then please feel free to contact us. We will review your website within just a few hours or less. But will NOT accept illegal or adult material neither the use of frame breakers.</p>
<p align="right"><?php echo "<a href=\"advertise.php?r=".$elref."\">";?>Read More...</a></p>


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
<blockquote><h4>How much can I earn?</h4>

If you click 10 ads a day, you refer 100 members who click 10 ads a day, you could earn up to $<?php echo $monthly?> monthly, that means $<?php echo $yearly ?> yearly. With more referrals or ads the earning potential is endless.</blockquote>





<?php include ('footer.php'); ?>