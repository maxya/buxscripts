<?php include ('header.php'); 

?>


<h3>������ ����������?</h3>

<p><img class="img-left" src="images/users.png" width="48" height="48" alt="Image" />
�� ������ ���������� � ��������� ������, �� �� ������ ���? �� ��� �������! � ������� ������� <? include('sitename.php'); ?>
�� ������ ���������� ������, �� �������� ��� ����� ������� ������. ��� ����� �����! ��� �� ����� ����� �����-���� ����������� ������. ��� ������ ����� ������������� ����� ����� ���������.
 <span class="highlight">���� �� ������ ������������ ������� ���������� �����, �� ����������� � ��� ����� ������ � ��������. </span>
 ������������ ������ ������������� ������ ���� ����� �������� ������� WebMoney. ����������� ����� ������� $<? require ('config.php');

								$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"];
								mysql_close($con); ?> ������� ������������ ������ ����� ������!</p>

<p align="right"><?php echo "<a href=\"register.php?r=".$elref."\">";?>�����������!</a></p>

<h3>����������� �������</h3>

<p><img class="img-left" src="images/money.gif" width="48" height="48" alt="Image" />

 � ��� ���� ���������� ������, �� ��� �����������? �� ������ ������������� ���� ������ � ������? �� ������� ���. � ������� �������  <? include('sitename.php'); ?> ��������� ������ ����� ������ � ��� ��������� ������� ������ ���������������� �����������. ��, ��������, ������ �������� �����  $<?
								require ('config.php');
								$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result); echo $row["price"]; mysql_close($con);?> 
								�� <? require ('config.php');
							 	$sql = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
								$result = mysql_query($sql);        
								$row = mysql_fetch_array($result);echo $row["howmany"]; mysql_close($con);?> 
							���������� ������� �� ��� ����, ��� ���� ������ ����� �� ��� ���� ������ �� ����� 20 ������. ����� ������� ����������� �� �������� ��� ���� � � ������� 10 ����� ���������� ���. ��� �� ����� ����� � ��� ������� ������, ��� ����� ������ ��������� ����� � �������� ��������� ���������� �����������. ��� ���������� ��������� ������ ����� ����� ����� �� �������� "�������� �������". ��������������� � ��������� ��� ���� ���� ������ � �����������!</p>
<p align="right"><?php echo "<a href=\"advertise.php?r=".$elref."\">";?>�������� �������...</a></p>


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
<blockquote><h4>������� � ���������?</h4>

���� �� �������� �� 10 �������� � ����, � ���������� 100 ��������� ������� ������� �� 10 ��������, �� ������� ����������  $<?php echo $monthly?> � �����, � $<?php echo $yearly ?> � ���!</blockquote>





<?php include ('footer.php'); ?>
