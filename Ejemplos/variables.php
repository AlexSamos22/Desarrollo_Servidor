<?php
/*Declaracion*/
$entero = 4;
$numero = 4.5;
$cadena = "hola";
$bool = TRUE;
/*Cambio de tipo de variable*/
$a = 5;

echo gettype($a);
echo"<br>";
$a = "Hola";

echo gettype($a);

/*Asignaciones */

$entero2 = 4;
$entero1 = $entero2; /* Copia */
$entero3 = 6;

$entero2 = &$entero3; /*Referencia */

echo $entero1;
echo $entero2;
echo $entero3;
echo '<br>';

/*Contantes */

define("LIMITE", 100);

echo LIMITE;

/*Tipos de datos*/
echo PHP_INT_SIZE."<br>";
echo PHP_INT_MIN."<br>";
echo PHP_INT_MAX."<br>";
$a = 0b100; // en binario
$a = 0100; // en octal
$a = 0x100;//en hexadecimal
$a = 3/2;
echo $a.'<br>';
$b = 7.5;
$a = (int)$b;
echo $a.'<br>';
$b = 7e2;
$b = 7E2;

/* Comillas y comillas simples en cadenas  */
$var = "Paco";
$a = "Hola $var <br>"; // valor de la variable
$b= 'Hola $var'; // el nombre de la variable

echo $a.'<br>';
echo $b;
echo '<br>';

//Variables predefinidas
echo "Ruta dentro de htdocs: ". $_SERVER['PHP_SELF'].'<br>';
echo "Nombre del servidor: ". $_SERVER['SERVER_NAME'].'<br>';
echo "Software del servidor: ". $_SERVER['SERVER_SOFTWARE'].'<br>';
echo "Protocolo: ". $_SERVER['SERVER_PROTOCOL'].'<br>';
echo "Metodo de la peticion: ". $_SERVER['REQUEST_METHOD'];



?>