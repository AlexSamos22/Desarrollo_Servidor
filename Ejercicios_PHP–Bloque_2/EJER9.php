<?php
    $matrizBidimensional = array(
        array(1, 0, 0),
        array(0, 1, 0),
        array(0, 0, 1)
    );

    for($i = 0; $i < count($matrizBidimensional); $i++){
        for ($j=0; $j <count($matrizBidimensional[$i]) ; $j++) { 
           echo $matrizBidimensional[$i][$j];
        }
        echo "<br>";
    }
    
?>