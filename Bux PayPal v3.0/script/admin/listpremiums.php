<?


$tablaaa = mysql_query("SELECT * FROM tb_users where account='premium' ORDER BY id ASC"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre

while ($registroe = mysql_fetch_array($tablaaa)) { // comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen


echo $registroe["id"] ." - "; 
echo $registroe["username"] ." - "; 
echo $registroe["email"] ." - "; 
echo $registroe["pemail"] ." - "; 
echo "<br>"; 
}

?>