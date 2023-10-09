<?php
    $año = 2020;

    if ($año%400 == 0) {
        echo "El año: $año es bisiesto";
    }elseif ($año%4 == 0 and $año%100 != 0) {
        echo "El año: $año es bisiesto";
    }else{
        echo "El año: $año no es bisiesto";
    }
?>