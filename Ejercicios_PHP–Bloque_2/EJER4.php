<?php

function palindromo($cadena){
    $cadenaInvertida = strrev($cadena);

    if(strtolower($cadena) == strtolower($cadenaInvertida)){
        echo "La cadena es un palindromo";
    }else{
        echo "La cadena no es un palindromo";
    }
}
   palindromo("Amor a Roma"); 
?>