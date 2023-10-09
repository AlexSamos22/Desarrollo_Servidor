<?php
    $dinero = 350;
    $contador500 = 0;
    $contador100 = 0;
    $contador50 = 0;
    $contador20 = 0;
    $contador10 = 0;
    $contador2 = 0;
    $contador1 = 0;


    do {
        if($dinero - 500 >= 0){
            $dinero = $dinero - 500;
            $contador500 ++;
        }elseif ($dinero - 100 >= 0) {
            $dinero = $dinero - 100;
            $contador100 ++;
        }elseif ($dinero - 50 >= 0) {
            $dinero = $dinero - 50;
            $contador50 ++;
        }elseif($dinero - 20 >= 0){
            $dinero = $dinero - 20;
            $contador20++;
        }elseif ($dinero - 10 >= 0) {
            $dinero = $dinero - 10;
            $contador10 ++;
        }elseif ($dinero- 2 >= 0) {
            $dinero = $dinero - 2;
            $contador2 ++;
        }else{
            $dinero = $dinero - 1;
            $contador1 ++;
        }
    } while ($dinero > 0);
        
    
    echo "Billetes de 500: $contador500 <br>";
    echo "Billetes de 100: $contador100 <br>";
    echo "Billetes de 50: $contador50 <br>";
    echo "Billetes de 20: $contador20 <br>";
    echo "Billetes de 10: $contador10 <br>";
    echo "Monedas de 2 euros: $contador2 <br>";
    echo "Monedas de 1 euro: $contador1";
?>