<?php
    $listaNumeros = array(1 , 2, 3, 4, 5, 6, 7, 8, 9, 10);
    $valorDoble = array();
    foreach ($listaNumeros as &$value) {
        $valorDoble[] = $value*2;    
    }

    foreach($valorDoble as $value){
        echo $value. "<br>";        
    }
?>