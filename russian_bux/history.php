<? include('header.php'); ?>


<h3 class="pagetitle">���� �������</h3>
<br>
<b>������� ������:</b> ����� ����, ��� �� �������� ������� �� ��������� ��� ������� �� ��������� ������.<br>
<b>������:</b> ��� ������� ����� ����������� ������ �������� �� WebMoney.

<br><br>
<div id="tables">
<table align="center" width="80%" cellspacing="0" cellpadding="0">
<tr>
<th class="top"><b>
����
</b></th>
<th class="top"><b>
�����
</b></th>
<th class="top"><b>
������
</b></th>
<th class="top"><b>
���������
</b></th>
</tr>


<?

$lole=$_COOKIE["usNick"];
require('config.php');

$tabla = mysql_query("SELECT * FROM tb_payme where username='$lole' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen




echo "<tr><td align='center'>";

echo "&nbsp;";

echo "</td><td align='center'>";

echo $row["money"];

echo "</td><td align='center'>";

echo "WebMoney";

echo "</td><td align='center'>";

echo "� �������";

echo "</td></tr>";

}






$lole=$_COOKIE["usNick"];

$tabla = mysql_query("SELECT * FROM tb_history where user='$lole' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($row = mysql_fetch_array($tabla)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen




echo "<tr><td align='center'>";

echo $row["date"];

echo "</td><td align='center'>";

echo $row["amount"];

echo "</td><td align='center'>";

echo $row["method"];

echo "</td><td align='center'>";

echo $row["status"];

echo "</td></tr>";

}

echo "</table>";

?>
</div>







		<!--footer starts here-->
<? include('footer.php'); ?>
