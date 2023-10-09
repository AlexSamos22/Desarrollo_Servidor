<?php
    function manejandoErrores($error, $str, $file, $line){
        echo "Ocurrio el error: $error";
    }

    set_error_handler("manejandoErrores");
    $a = $b; //causa error, $b no esta inicializada
?>