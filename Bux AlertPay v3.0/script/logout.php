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

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?action=logout">



