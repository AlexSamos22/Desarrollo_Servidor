<?php
    function dividir($a, $b){
        if ($b == 0) {
            throw new Exception("El segundo argumento es 0");
        }
        return $a / $b;
    }

    try {
        $result = dividir(5, 0);
        echo "Resultado 1:  $result <br>";
    } catch (Exception $e) {
        echo "Excepcion: ". $e->getMessage()."<br>";
    }finally{
        echo "Primer final";
    }

    try {
        $result = dividir(5, 2);
        echo "Resultado 1:  $result <br>";
    } catch (Exception $e) {
        echo "Excepcion: ". $e->getMessage()."<br>";
    }finally{
        echo "Segundo final";
    }

?>