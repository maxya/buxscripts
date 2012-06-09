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
function ValidaMail($pemail) {
    if (ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$", $pemail ) ) {
       return true;
    } else {
echo "Ingresa un mail valido"; exit();
    }
}

// minimo de carateres
function minimo($contenido) {

if (strlen($contenido) < 3) {

echo "Debes ingresar al menos 3 caracteres."; exit();

} else {

// echo "todo bien...";
return $contenido;
}  
}


function minimopass($contenido) {

if (strlen($contenido) < 6) {

echo "Debes ingresar al menos 6 caracteres en el password."; exit();

} else {

// echo "todo bien...";
return $contenido;
}  
}

// funcion para sanitizar variables
function limpiar($mensaje)
{

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
       echo "El campo $nombre_usuario no es válido ya que contiene caracteres no permitidos<br>";
exit();
   }
} 




// universal cleaner function


function uc($mensaje)
{

   if (ereg("^[a-zA-Z0-9\-_]{3,20}$", $mensaje)) {
//      echo "El campo $mensaje es correcto<br>";

$mensaje = str_replace("'"," ",$mensaje);
$mensaje = str_replace(";"," ",$mensaje);
$mensaje = str_replace("$"," ",$mensaje);
return $mensaje;
   } else {
       echo "El campo $mensaje no es válido ya que contiene caracteres no permitidos<br>";
exit();
   }

}








//funcion para añadir smylies

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
   
      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar
      // una dirección ip que no sea del rango privado. En caso de no
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
                  '/^127\.0\.0\.2/',
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
