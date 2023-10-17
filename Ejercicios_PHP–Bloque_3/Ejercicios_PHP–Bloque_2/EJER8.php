<?php
 $array = array("DE" => "BERLIN", "DK" => "COPENHAGE", "ES" => "ESPAÑA");

 $pais = "BERLIN";

 foreach ($array as $key => $value) {
    if($pais == $value){
        echo "El codigo pertenece al pais: $key";
    }
 }
?>