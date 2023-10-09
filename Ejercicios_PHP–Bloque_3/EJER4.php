<?php
    function numPrimo($num) {
        $primos = array();
        for ($i=1; $i <= $num; $i++) { 
            if($num%$i == 0){
                array_push($primos, $i);
            }
        }

        $divisores = count($primos);
        if($divisores == 2){
            $cadena = "El numero $num si es primo";
           return $cadena;
        }else{
            $cadena = "El numero $num no es primo";
            return $cadena;
        }
    }

    $numeroPrimo = numPrimo(31);
    echo $numeroPrimo;
?>