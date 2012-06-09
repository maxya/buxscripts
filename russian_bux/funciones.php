<?php


function limitatexto( $texto, $limite )
  {
    if( strlen($texto)>$limite )
      {
        $texto = substr( $texto,0,$limite );
      }
    return $texto;

  }





function mostrarTemplate($tema, $variables)
{
    //var_dump($variables);
    extract($variables);
    eval("?>".$tema."<?");
}

function parsearTags($mensaje)
{
    $mensaje = str_replace("[citar]", "<blockquote><hr width='100%' size='2'>", $mensaje);
    $mensaje = str_replace("[/citar]", "<hr width='100%' size='2'></blockquote>", $mensaje);
    return $mensaje;
}

// funcion para validar email
function ValidaMail($pMail) {
    if (ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $pMail ) ) {
       return true;
    } else {
echo "Вы Должны Ввести Правильный Адрес Email"; exit();
    }
}

// funcion para validar email
function ValidaWMID($pMail) {
    if (ereg("[_A-Z0-9-]$", $pMail ) ) {
       return true;
    } else {
echo "Вы Должны Ввести Правильный Z кошелек"; exit();
    }
}

// minimo de carateres
function minimo($contenido) {

if (strlen($contenido) < 3) {

echo "Ваш логин должен быть по крайней мере из 3 символов.";include('footer.php'); exit();

} else {

// echo "todo bien...";
return $contenido;
}
}


function minimopass($contenido) {

if (strlen($contenido) < 6) {

echo "Ваш пароль должен быть по крайней мере из 6 символов.";include('footer.php'); exit();

} else {

// echo "todo bien...";
return $contenido;
}
}

// funcion para sanitizar variables
function limpiar($mensaje)
{
$mensaje = htmlentities(stripslashes(trim($mensaje)));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
}

function shout($nombre_usuario){
   if (ereg("^[a-zA-Z0-9\-_]{3,20}$", $nombre_usuario)) {
//      echo "El campo $nombre_usuario es correcto<br>";
      return $nombre_usuario;
   } else {
       echo "The Field $nombre_usuario is not valid<br>";include('footer.php');
exit();
   }
}




// universal cleaner function


function uc($mensaje)
{

   if (ereg("^[a-zA-Z0-9\-_]{3,20}$", $mensaje)) {
//      echo "El campo $mensaje es correcto<br>";
$mensaje = htmlentities(stripslashes(strtolower(trim($mensaje))));
$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
   } else {
       echo "The Field $mensaje is not Valid<br>";include('footer.php');
exit();
   }

}








//funcion para aсadir smylies

function caretos($texto,$ruta)
{
	$i="<img src=\"$ruta/";
	$i_="\" >";
	$texto=str_replace(":)",$i."icon_smile.gif".$i_,$texto);
	$texto=str_replace(":D",$i."icon_biggrin.gif".$i_,$texto);
	$texto=str_replace("^^",$i."icon_cheesygrin.gif".$i_,$texto);

	$texto=str_replace("xD",$i."icon_lol.gif".$i_,$texto);
	$texto=str_replace("XD",$i."icon_lol.gif".$i_,$texto);

	$texto=str_replace(":|",$i."icon_neutral.gif".$i_,$texto);
	$texto=str_replace(":(",$i."icon_sad.gif".$i_,$texto);
	$texto=str_replace(":&#039(",$i."icon_cry.gif".$i_,$texto);
	$texto=str_replace(":O",$i."icon_surprised.gif".$i_,$texto);
	$texto=str_replace("B)",$i."icon_cool.gif".$i_,$texto);
	$texto=str_replace("8|",$i."icon_rolleyes.gif".$i_,$texto);
	$texto=str_replace("O_O",$i."icon_eek.gif".$i_,$texto);
	$texto=str_replace(":P",$i."icon_razz.gif".$i_,$texto);
	$texto=str_replace(":?",$i."icon_confused.gif".$i_,$texto);
	$texto=str_replace("^:@",$i."icon_evil.gif".$i_,$texto);
	$texto=str_replace("^_-",$i."icon_frown.gif".$i_,$texto);
	$texto=str_replace("!(",$i."icon_mad.gif".$i_,$texto);
	$texto=str_replace("^)",$i."icon_twisted.gif".$i_,$texto);
	$texto=str_replace(";)",$i."icon_wink.gif".$i_,$texto);
	$texto=str_replace(":B",$i."drool.gif".$i_,$texto);
	return $texto;
}

// ip real
function getRealIP()
{

   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );

      // los proxys van aсadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una direcciуn ip que no sea del rango privado. En caso de no
      // encontrarse ninguna se toma como valor el REMOTE_ADDR

      $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

      reset($entries);
      while (list(, $entry) = each($entries))
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./',
                  '/^127\.0\.0\.1/',
                  '/^192\.168\..*/',
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
                  '/^10\..*/');

            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );
   }

   return $client_ip;

}

?>
