<?php
/*
Realiza un programa que, con una cadena inicializada, nos cambie su contenido a
mayúsculas o minúsculas dependiendo del valor de otra variable, es decir, si la variable
opción vale 0 pase a minúsculas y si su valor es otro pase la cadena a mayúsculas. Para
la realización de este ejercicio se debe recorrer la cadena analizando cada palabra, no se
puede usar el comando strtoupper ni strtolower.
*/

$cadena = "HoooLAAAAaaa";

function cambiarLetras($cadena, $opcion) {
    $nuevaCadena = "";
    if ($opcion == 0) {
        for ($i=0; $i < strlen($cadena) ; $i++) { 
            if (ctype_lower($cadena[$i])) {
                $nuevaCadena .= $cadena[$i];
            }else{
                $nuevaCadena .= chr(ord($cadena[$i]) + 32);
            }
        }
        return $nuevaCadena;
    }else{
        for ($i=0; $i < strlen($cadena) ; $i++) { 
            if (ctype_upper($cadena[$i])) {
                $nuevaCadena .= $cadena[$i];
            }else{
                $nuevaCadena .= chr(ord($cadena[$i]) -32 );
            }
        }
        return $nuevaCadena;
    }
}

$aux = cambiarLetras($cadena, 0);
echo $aux;
?>