<?php
//Alex Samos
    $numero = 10;
    $factorial = 1;

    if ($numero < 0) {
        echo "El numero no puede ser negativo";

    }elseif($numero == 1 || $numero == 0){
        echo "El facotrial es 1";

    }else{

        for ($i = 1; $i <= $numero ; $i++) { 
            $factorial *= $i;
        }

      echo "El factorial de $numero es: $factorial <br>";
    }
        

 
?>