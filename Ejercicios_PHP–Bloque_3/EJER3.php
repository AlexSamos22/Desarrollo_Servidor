<?php
    function divisores($num){
        $divisores = array();
        for ($i=1; $i <= $num; $i++) { 
            if($num%$i == 0){
                array_push($divisores, $i);
            }
        }
        return $divisores;
    }

    $array = array(divisores(6));
    print_r($array);
?>