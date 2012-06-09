<? include('header.php'); ?>


<div id="myaccount">

<p class="reflink" align="center">Ccылка для привлечения рефералов,рекламодателей: <span class="textblue">
													<? require("config.php"); echo $url; ?>/?r=<? echo $row["username"]; ?>
												   </span></p>

<?php
require ('config.php');
$lole=$_COOKIE["usNick"];
$check_messages = mysql_query("SELECT * FROM tb_messenger WHERE sendto='$lole' and status='unread'");
$messages = mysql_num_rows($check_messages);
mysql_close($con);
?>
<table width="80%" align="center">
	<tr>
		<td><a href="profile.php" class="links"><p class="links" align="center">Ваш профиль</p></a></td>
		<td><a href="history.php" class="links"><p class="links" align="center">Ваша история</p></a></td>
		<td><a href="messenger.php" class="links"><p class="links" align="center">Почта (<?php echo $messages ?>)</p></a></td>
	</tr>
	<tr>
		<td><a href="referals.php" class="links"><p class="links" align="center">Ваши рефералы</p></a></td>
		<td><a href="convert.php" class="links"><p class="links" align="center">Конвертация в деньги/рекламу</p></a></td>
		<td><a href="upgrade.php" class="links"><p class="links" align="center">Апгрейды</p></a></td>
	</tr>
	<tr>
		<td><a href="purchase.php" class="links"><p class="links" align="center">Купить рефералов</p></a></td>
		<td><a href="advertise.php" class="links"><p class="links" align="center">Реклама</p></a></td>
		<td><a href="logout.php" class="links"><p class="links" align="center">Выход</p></a></td>
	</tr>

</table>








</div>





		<!--footer starts here-->
<? include('footer.php'); ?>
