<?php
session_start();

// Juego de letras para usar
$letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// Configuración tamaño imagen y tamaño fuente
$ancho_caja = 130;
$alto_caja = 60;
$tam_letra = 10;
$tam_letra_grande = 45;
// angulo máximo que rota (izq y der) cada letra
$angmax = 20;
// Establecer el tipo de contenido
header("Content-type: image/png");

// Creamos una imagen
$im = imagecreate($ancho_caja, $alto_caja);

// Creo el color del texto, del texto del fondo y del fondo de la imagen
$gris = ImageColorAllocate($im, 247, 247, 247);
$colorLetra = ImageColorAllocate($im, 105, 159, 189);
$colorLetraFondo = ImageColorAllocate($im, 247, 247, 247);


// tipo de letra obtenido en dafont.net
$fuente = './image2.ttf';

// Calculo el número de líneas que entran
$caja_texto = imagettfbbox($tam_letra, 0, $fuente , $letras);
$alto_linea = abs($caja_texto[7]-$caja_texto[1]);
$num_lineas = intval($alto_caja / $alto_linea)+1;

// Dibujo las letras del fondo
// Cada letra de escribe de una en una para poder
// darle una rotación independiente al resto
$pos = 0;
for ($i = 0; $i<$num_lineas; $i++) {
    $x = 0;
    for ($j = 0; $j<30; $j++) {
        $texto_linea = $letras[rand(0, strlen($letras)-1)].' ';
        $caja_texto = imagettfbbox($tam_letra, 0, $fuente , $texto_linea);
    	imagettftext($im, $tam_letra, rand(-$angmax, $angmax), $x, $alto_linea*$i, $colorLetraFondo, $fuente , $texto_linea);
        // Posicion x de la siguiente letra
        $x += $caja_texto[2] - $caja_texto[0];
    }
}


// Escribo las tres letras del CAPTCHA
$res = $letras[rand(0, strlen($letras)-1)];
$ang1 = rand(-$angmax, $angmax);
$caja_texto = imagettfbbox($tam_letra_grande, $ang1, $fuente , $res);
$y1 = abs($caja_texto[7]-$caja_texto[1]);
$x1 = abs($caja_texto[2]-$caja_texto[0]);

$res .= $letras[rand(0, strlen($letras)-1)]; 
$ang2 = rand(-$angmax, $angmax);
$caja_texto = imagettfbbox($tam_letra_grande, $ang2, $fuente , $res[1]);
$y2 = abs($caja_texto[7]-$caja_texto[1]);
$x2 = abs($caja_texto[2]-$caja_texto[0]);

$res .= $letras[rand(0, strlen($letras)-1)]; 
$ang3 = rand(-$angmax, $angmax); 
$caja_texto = imagettfbbox($tam_letra_grande, $ang3, $fuente , $res[2]);
$y3 = abs($caja_texto[7]-$caja_texto[1]);
$x3 = abs($caja_texto[2]-$caja_texto[0]);

imagettftext($im, $tam_letra_grande, $ang1, ($ancho_caja/2)-(($x1+$x2+$x3)/2), $y1+($alto_caja-$y1)/2, $colorLetra, $fuente , $res[0]);
imagettftext($im, $tam_letra_grande, $ang2, ($ancho_caja/2)-(($x1+$x2+$x3)/2)+($x1), $y2+($alto_caja-$y2)/2, $colorLetra, $fuente , $res[1]);
imagettftext($im, $tam_letra_grande, $ang3, ($ancho_caja/2)-(($x1+$x2+$x3)/2)+($x1+$x2), $y3+($alto_caja-$y3)/2, $colorLetra, $fuente , $res[2]);

imagepng($im);
imagedestroy($im);
imagedestroy($im2);

$_SESSION["texto"] = $res;
?> 
