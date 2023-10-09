<?php
    $numero = 14321;
    $premiado = 13451;

    if($numero === $premiado){
        echo "El numero: $premiado es el ganador!!!<br>";
    }else{
        $primeraCifraNumero = intval($numero /10000);
        $ultimaCifraNumero = $numero%10;

        $primeraCifraPremiado = intval($premiado /10000);
        $ultimaCifraPremiado = $premiado%10;

        if($primeraCifraNumero == $primeraCifraPremiado and $ultimaCifraNumero == $ultimaCifraPremiado){
            echo "El numero $premiado tiene reintegro";
        }else{
            echo "El numero no es el ganador ni tiene reintegro";
        }

    }
?>