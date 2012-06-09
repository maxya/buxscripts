<html>
<head>
<title>VicPay Admin Section</title>
<link href="tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel="stylesheet" type="text/css" href="sdmenu/sdmenu.css" />
<script type="text/javascript" src="tablecloth/tablecloth.js"></script>

















<script type="text/javascript">

function setCookie (name, value, path, domain, secure, expires)
{
    document.cookie= name + "=" + escape(value) +
        ((expires) ? "; expires=" + expires.toGMTString() : "") +
        ((path) ? "; path=" + path : "") +
        ((domain) ? "; domain=" + domain : "") +
        ((secure) ? "; secure" : "");
}

function getCookie (name)
{
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1)
    {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
    }
    var end = document.cookie.indexOf(";", begin);
    if (end == -1)
    {
        end = dc.length;
    }
    return unescape(dc.substring(begin + prefix.length, end));
}

function deleteCookie (name, path, domain)
{
    if (getCookie(name))
    {
        document.cookie = name + "=" + 
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
}


function addLoadEvent (func)
{    
    var oldonload = window.onload;
    if (typeof window.onload != 'function')
    {
        window.onload = func;
    } 
    else 
    {
        window.onload = function()
        {
            oldonload();
            func();
        }
    }
}

</script>

<script type="text/javascript">

function menu_init ()
{
	var menu = document.getElementById('nav');
	var subs = menu.childNodes;
	
	var j = 0;
	
	for (var i=0 ; subs[i]; i++)
	{
		if (subs[i].tagName=='LI')
		{
			hs = subs[i].getElementsByTagName('B');
			heading = hs[0];
			ss = subs[i].getElementsByTagName('UL');
			submenu = ss[0];
			
			j++;
			
			heading.onclick = function () { menu_toggle(this); };

			if (getCookie('menu'+j)=='1')
				 submenu.style.display = 'block';
			else if (getCookie('menu'+j)=='0')
				submenu.style.display = 'none';
			else if (j==1)
				submenu.style.display = 'block';
			else
				submenu.style.display = 'none';
		}
	}
}

function menu_toggle (heading)
{
	var section = heading.parentNode;
	var submenus = section.getElementsByTagName('UL');
	var submenu = submenus[0];
		
	if (submenu.style.display=='none')
		submenu.style.display = 'block';
	else
		submenu.style.display = 'none';
		
	var j = 0;

	var menu = document.getElementById('nav');
	var subs = menu.childNodes;
	for (var i=0 ; subs[i]; i++)
	{
		if (subs[i].tagName=='LI')
		{
			hs = subs[i].getElementsByTagName('B');
			h = hs[0];			
			j++;
			
			if (h==heading && submenu.style.display=='none')
				setCookie('menu'+j, '0', '/');
			else if (h==heading)
				setCookie('menu'+j, '1', '/');
		}
	}
		

}

addLoadEvent(menu_init);

</script>

<!--[if IE 6]>
<script type="text/javascript">
// Suckerfish-like code to get B:hover working in IE 6.
function sucker_bold ()
{
	bs = document.getElementById("nav").getElementsByTagName('B');
	for (i=0; bs[i]; i++)
	{
		node = bs[i];
		node.onmouseover=function() { this.className+=" over"; }
		node.onmouseout=function() { this.className=this.className.replace(" over", ""); }
	}
}
addLoadEvent(sucker_bold);
</script>
<![endif]-->



















</head>
<body>
<script type="text/javascript" src="wz_tooltip.js"></script>
<? include('start.php'); ?>




<!---------------------------- MENU ------------------------------->
<div id="framecontent">
<div class="innertube">
<? include('menu.php'); ?>
</div>
</div>
<!---------------------------- FIN MENU --------------------------->



<div id="maincontent">
<div class="innertube">
<!---------------------------- CUERPO ----------------------------->


						<!--- op 1 -->
<?
$op = $_GET["op"];
switch($op) {
	case(1):
?>

<? include('adreq.php'); ?>


						<!--- op 2 -->
<?
break;
	case (2):
?>

<? include('editads.php'); ?>


						<!--- op 3 -->
<?
break;
	case (3):
?>

<? include('messages.php'); ?>

						<!--- op 4 -->
<?
break;
	case (4):
?>

<? include('payreq.php'); ?>


						<!--- op 5 -->
<?
break;
	case (5):
?>

<? include('buyref.php'); ?>





						<!--- op 6 -->

<?
      break;
    case (6):
?>

<? include('refreq.php'); ?>

						<!--- op 7 -->

<?
break;
	case (7):
?>

<? include('editusers.php'); ?>


						<!--- op 8 -->

<?
break;
	case (8):
?>

<? include('prueba.php'); ?>
						<!--- op 9 -->

<?
break;
	case (9):
?>

<? include('configsite.php'); ?>

						<!--- op 10 -->

<?
break;
	case(10):
?>

<? include('aproveadreq.php'); ?>

						<!--- op 11 -->
<?
break;
	case(11):
?>

<? include('aproveupgreq.php'); ?>

						
						<!--- op 12 -->
<?
break;
	case(12):
?>

<? include('emails.php'); ?>


						<!--- op 13 -->

<? 
break;
	case("13"):
?>

<? include('cleanads.php'); ?>


						<!--- op 24 -->

<?
break;
	case(24):
?>

<? include('addcat.php'); ?>


						<!--- op 25 -->

<?
break;
	case(25):
?>

<? include('modifycat.php'); ?>




						<!--- op 26 -->

<?
break;
	case(26):
?>

<? include('addrefset.php'); ?>


						<!--- op 27 -->

<?
break;
	case(27):
?>

<? include('modrefset.php'); ?>


						<!--- op 28 -->

<?
break;
	case(28):
?>

<? include('addads.php'); ?>



						<!--- op 29 -->

<?
break;
	case(29):
?>

<? include('searchusers.php'); ?>



						<!--- op 30 -->

<?
break;
	case(30):
?>

<? include('searchip.php'); ?>

						<!--- op 31 -->

<?
break;
	case(31):
?>

<? include('listpremiums.php'); ?>





<?
break;

}
?>














<!---------------------------- FIN CUERPO ------------------------->
</div>
</div>







</body>
</html>