<?php
    $cadena = "Hola que tal";
    $palabra = "";
    for ($i=0; $i < strlen($cadena) ; $i++) { 
        if($cadena[$i] != " "){
            $palabra .= $cadena[$i];
        }else{
            echo $palabra."<br>";
            $palabra = "";
        }
    }
    echo $palabra;
?>