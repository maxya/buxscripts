<?
if (isset($_POST["click"]))
{


$sitename=$_POST["sitename"];
$sitepp=$_POST["sitepp"];
$click=$_POST["click"];
$referalclick=$_POST["referalclick"];
$payment=$_POST["payment"];
$premiumclick=$_POST["premiumclick"];
$premiumreferalc=$_POST["premiumreferalc"];
$upgrade=$_POST["upgrade"];
$hits500=$_POST["hits500"];
$hits1000=$_POST["hits1000"];
$hits2000=$_POST["hits2000"];
$hits3000=$_POST["hits3000"];
$hits5000=$_POST["hits5000"];
$hits10000=$_POST["hits10000"];








    //Todo parece correcto procedemos con la inserccion


	$query = "UPDATE tb_site SET sitename='$sitename' where id='1'";
    mysql_query($query) or die(mysql_error());

	$query = "UPDATE tb_site SET sitepp='$sitepp' where id='1'";
    mysql_query($query) or die(mysql_error());




    $query = "UPDATE tb_config SET price='$click' where item='click' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$referalclick' where item='referalclick' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$premiumclick' where item='premiumclick' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$premiumreferalc' where item='premiumreferalc' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$payment' where item='payment' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$upgrade' where item='upgrade' and howmany='1'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits500' where item='hits' and howmany='500'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits1000' where item='hits' and howmany='1000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits2000' where item='hits' and howmany='2000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits3000' where item='hits' and howmany='3000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits5000' where item='hits' and howmany='5000'";
    mysql_query($query) or die(mysql_error());

    $query = "UPDATE tb_config SET price='$hits10000' where item='hits' and howmany='10000'";
    mysql_query($query) or die(mysql_error());










    echo "<font color=\"green\"><b>���� ��������.</b></font><br><br>";


}


?>

<form method="post" action="index.php?op=9">


<?
$sql = "SELECT * FROM tb_site WHERE id='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);
?>

<b>��������� �����</b><br>
<table>
<tr><th width="200">
��� �����</th><td> <input type="text" name="sitename" value="<? echo $row["sitename"]; ?>"

size="30" maxlength="30">
</td></tr>

<tr><th>

WMID:</th><td> <input type="text" name="sitepp" value="<?

$sql = "SELECT * FROM tb_site WHERE id='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

 echo $row["sitepp"]; ?>" size="30" maxlength="30"></td></tr>
 </table>




<?

$sql = "SELECT * FROM tb_config WHERE item='click' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

?>
<b>��������� ������</b><br>
<table>
<tr>
<th width="200">���� �� ����:</th><td> $<input type="text" name="click" value="<? echo $row["price"]; ?>"></td></tr>
<tr>
<th width="200">���� �� ���� ��������:</th><td> $<input type="text" name="referalclick" value="<?

$sql = "SELECT * FROM tb_config WHERE item='referalclick' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

 echo $row["price"]; ?>"></td></tr>
<tr>
<th width="200">������� � �������:</th><td> $<input type="text" name="payment" value="<?

$sql = "SELECT * FROM tb_config WHERE item='payment' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["price"]; ?>"></td></tr>

<tr>
<th width="200">�������� ���� (2 months):</th><td> $<input type="text" name="upgrade" value="<?

$sql = "SELECT * FROM tb_config WHERE item='upgrade' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["price"]; ?>"></td></tr></table>


<?

$sql = "SELECT * FROM tb_config WHERE item='premiumclick' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

?>
<b>Premium ���������</b><br>
<table>
<tr>
<th width="200">���� premium �� ����:</th><td> $<input type="text" name="premiumclick" value="<? echo $row["price"]; ?>"></td></tr>
<tr>
<th width="200">���� premium �� ���� ��������:</th><td> $<input type="text" name="premiumreferalc" value="<?

$sql = "SELECT * FROM tb_config WHERE item='premiumreferalc' and howmany='1'";
$result = mysql_query($sql);        
$row = mysql_fetch_array($result);

echo $row["price"]; ?>"></td></tr></table>


<b>��������� �������</b><br>




<table>
<tr>
<th width="200">���� �� 500 ������:</th><td> $<input type="text" name="hits500" value="<?

$sqlfn = "SELECT * FROM tb_config WHERE item='hits' and howmany='500'";
$resultfn = mysql_query($sqlfn);        
$rowfn = mysql_fetch_array($resultfn);

echo $rowfn["price"];

?>"></td></tr>




<tr>
<th width="200">���� �� 1000 ������:</th><td> $<input type="text" name="hits1000" value="<?

$sqla = "SELECT * FROM tb_config WHERE item='hits' and howmany='1000'";
$resulta = mysql_query($sqla);        
$rowa = mysql_fetch_array($resulta);

echo $rowa["price"];

?>"></td></tr>

<tr>
<th width="200">���� �� 2000 ������:</th><td> $<input type="text" name="hits2000" value="<?

$sqled = "SELECT * FROM tb_config WHERE item='hits' and howmany='2000'";
$resulted = mysql_query($sqled);        
$rowed= mysql_fetch_array($resulted);

echo $rowed["price"];

?>"></td></tr>

<tr>
<th width="200">���� �� 3000 ������:</th><td> $<input type="text" name="hits3000" value="<?

$sqli = "SELECT * FROM tb_config WHERE item='hits' and howmany='3000'";
$resulti = mysql_query($sqli);        
$rowi = mysql_fetch_array($resulti);

echo $rowi["price"];

?>"></td></tr>

<tr>
<th width="200">���� �� 5000 ������:</th><td> $<input type="text" name="hits5000" value="<?

$sqlo = "SELECT * FROM tb_config WHERE item='hits' and howmany='5000'";
$resulto = mysql_query($sqlo);        
$rowo = mysql_fetch_array($resulto);

echo $rowo["price"];

?>"></td></tr>

<tr>
<th width="200">���� �� 10000 ������:</th><td> $<input type="text" name="hits10000" value="<?

$sqlu = "SELECT * FROM tb_config WHERE item='hits' and howmany='10000'";
$resultu = mysql_query($sqlu);        
$rowu = mysql_fetch_array($resultu);

echo $rowu["price"];

?>"></td></tr>
</table>


<center><input type="submit" value="��������� ���������" class="button"></center>


</form>
