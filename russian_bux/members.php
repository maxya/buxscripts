<? include('header.php'); ?>


<div id="myaccount">

<p class="reflink" align="center">Cc���� ��� ����������� ���������,��������������: <span class="textblue">
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
		<td><a href="profile.php" class="links"><p class="links" align="center">��� �������</p></a></td>
		<td><a href="history.php" class="links"><p class="links" align="center">���� �������</p></a></td>
		<td><a href="messenger.php" class="links"><p class="links" align="center">����� (<?php echo $messages ?>)</p></a></td>
	</tr>
	<tr>
		<td><a href="referals.php" class="links"><p class="links" align="center">���� ��������</p></a></td>
		<td><a href="convert.php" class="links"><p class="links" align="center">����������� � ������/�������</p></a></td>
		<td><a href="upgrade.php" class="links"><p class="links" align="center">��������</p></a></td>
	</tr>
	<tr>
		<td><a href="purchase.php" class="links"><p class="links" align="center">������ ���������</p></a></td>
		<td><a href="advertise.php" class="links"><p class="links" align="center">�������</p></a></td>
		<td><a href="logout.php" class="links"><p class="links" align="center">�����</p></a></td>
	</tr>

</table>








</div>





		<!--footer starts here-->
<? include('footer.php'); ?>
