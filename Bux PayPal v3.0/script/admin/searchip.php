<?

$search=$_POST["search"];

if($_POST['search']){
    $resp = mysql_query("SELECT * FROM tb_users tb WHERE EXISTS(SELECT tb2.ip FROM tb_users tb2 WHERE tb.ip=tb2.ip AND tb.username<>tb2.username) order by ip") or die (mysql_error());
    if(mysql_num_rows($resp) == "0") {
     echo "The search did not yield any result .";
    } else {

            echo "<center><strong>SEARCH RESULTS</strong></center><br>";

			?>
			
			<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>Ip</th>
<th>E-mail</th>
<th>Referer</th>
<th>Visits</th>
<th>Money</th>
<th></th>
<th></th>
</tr>
<?

                   while($cat = mysql_fetch_array($resp)) {
                  
		   
echo "
<tr>
<td>". $cat["id"] ."</td>
<td>". $cat["username"] ."</td>
<td>". $cat["ip"] ."</td>
<td>". $cat["email"] ."</td>
<td>". $cat["referer"] ."</td>
<td>". $cat["visits"] ."</td>
<td>". $cat["money"] ."</td>
<td>";
?>
<form method="post" action="index.php?op=29&id=<?= $cat["id"] ?>&option=edit">
<input type="submit" value="Edit" class="button">
</form>
</td>
<td>
<form method="post" action="index.php?op=29&id=<?= $cat["id"] ?>&option=delete">
<input type="submit" value="Delete" class="button">
</form>
</td>
</tr>



<?


                   }

				   ?>
</table>  
	
<?
}
}else{

	?>

<form action="" method="POST" name='form1'>

<table><tr>
<th width="150">search:</th>
<td><select name="search">
					<option value="id">Ip</option>

					
	</select>
					</td></tr>


<tr><td></td><td>
<input type="submit" value="Search" class="button" name="search"></td></tr></table>

</form>
<br><br>





<?
}
?>
