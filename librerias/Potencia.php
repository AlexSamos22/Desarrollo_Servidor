<?php
//Alex Samos
    function potencia($base, $exponente = 2){
            $resultado = $base;
        for ($i=1; $i < $exponente ; $i++) { 
            $resultado *= $base;
        }

        return $resultado;
    }
?>