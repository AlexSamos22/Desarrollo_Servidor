<?php
    $var = 3;
    switch($var){
        case 1:
            echo "Es 1";
            break;
        case 2:
            echo "Es 2";
            break;
        case 3:
            echo "Es 3";
            break;
        default:
            echo "No es ni 1, ni 2, ni 3";
            break;
    }

    for ($i=0; $i < 5 ; $i++) { 
        echo "*";
    }

    while ($a <= 10) {
        echo ":";
        $a++;
    }

    do {
        $a++;
        echo "Patata";
    } while ($a <= 10);

    echo '<br>';

    for ($i=0; $i < 10; $i++) { 
        for ($j=0; $j < 5 ; $j++) { 
            echo "*";
        }
        echo '<br>';
    }

    for ($i=0; $i < 3; $i++) { 
        for($j=0; $j<3; $j++){
            echo "i: $i j: $j <br>";
            if ($j == 1) {
                break 2;
            }
        }
    }
?>