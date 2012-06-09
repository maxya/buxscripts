<?php 

function strrand($length) 
{ 
$str = ""; 

while(strlen($str)<$length){ 
$random=rand(48,122); 
if( ($random>47 && $random<58) ){ 
$str.=chr($random); 
} 

} 

return $str; 
} 

$text = $_SESSION['string']=strrand(5); 

echo $_SESSION['string'];

?>