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
			echo "�� ������� ������� ���� ������� ��: <b>$ibuy</b>";
			user::getrandomrefs(engine::$premium[$ibuy]['refs']);
	#mysql_query("INSERT INTO engine_premium (`user`) VALUES ('".user::$name."');") or die(mysql_error());
	#mysql_query("INSERT INTO engine_msg (`user`,`from`,`msg`,`time`) VALUES ('".user::$name."', '#adm#', '<b>����� ��������</b> - ��� ����� ���������, <a href=\"./?p=panel_lvl&n=0\">[��������]</a> ���� ������� ��������.','".time()."');") or die(mysql_error());
	#echo "��� ������ ���������. ";
	#echo "��� ����������� ������� ������ ��� ����� �������� $premium_price$<br>";
			engine::disconnectsql();
		}else{
			echo "�� ���������� ����� �� �������.";
		}
	}else{
		echo "��� ������� <b>Premium</b>, � ��� ������������ �������!";
	}
}else{
	?>
	� ����� ������� �� ������ ���������� 3 ���� ����������� ��������������.<br><br>
	������� - <?=engine::$premium['Silver']['name']?> (��� ����: 0.006$, ���� ��������: 0.0035$, ��������� 15$, ������� 1 � 15 �����)<br> ��������� <?=engine::$premium['Silver']['price']?>$
	&nbsp;+������� <b><?=engine::$premium['Silver']['refs']?></b> �������� ���������<br><br>
	
	������� - <?=engine::$premium['Gold']['name']?> (��� ����: 0.008$, ���� ��������: 0.0045$, ��������� 10$, ������� 1 � 15 �����)<br> ��������� <?=engine::$premium['Gold']['price']?>$
	&nbsp;+������� <b><?=engine::$premium['Gold']['refs']?></b> �������� ���������<br><br>
	
	������� - <?=engine::$premium['Platinum']['name']?> (��� ����: 0.01$, ���� ��������: 0.006$, ��������� 1$, ������� �� ����������)<br> ��������� <?=engine::$premium['Platinum']['price']?>$
	&nbsp;+������� <b><?=engine::$premium['Platinum']['refs']?></b> �������� ���������<br><br>
	(� ������� ������������� ���� ����������� ���� � ��������������� ��������) 
	<br>
	<?php 
	if(user::$account=="") echo '� ��� ����������� �������, ������ ��� �������� ������� <b>Silver</b><br><br>&nbsp;&nbsp;<a href="?p=panel_lvl&n=0&premadd"><img src="img/btn_buy.gif" /></a>'; 
	if(user::$account=="Silver") echo '��� ������� <b>Silver</b>, ������ ��� �������� ������� <b>Gold</b><br><br>&nbsp;&nbsp;<a href="?p=panel_lvl&n=0&premadd"><img src="img/btn_buy.gif" /></a>';
	if(user::$account=="Gold") echo '��� ������� <b>Gold</b>, ������ ��� �������� ������� <b>Platinum</b><br><br>&nbsp;&nbsp;<a href="?p=panel_lvl&n=0&premadd"><img src="img/btn_buy.gif" /></a>';
	if(user::$account=="Platinum") echo '��� ������� <b>Platinum</b>, � ��� ������������ �������!';

}} ?>