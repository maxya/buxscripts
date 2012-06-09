<?

if(isset($_COOKIE["usNick"]) && isset($_COOKIE["usPass"]))
{

$_COOKIE["usNick"] = "";
setcookie(usNick,"x",time() - 7776000);

$_COOKIE["usPass"] = "";
setcookie(usPass,"x",time() - 7776000);

$_COOKIE["visitas"] = "";
setcookie(visitas,"x",time() - 7776000);
}

include ('header.php');
?>
Profile edited successfuly. Please <a href="login.php">login</a> again with your new data...
<? include('footer.php'); ?>


