<?php
    function ecuacion($a, $b, $c){
        $xPositiva = 0;
        $xNegativa = 0;

       
            $bNegativa = $b * -1;
            $primeraOperacion = pow($b, 2);
            $segundaOperacion = 4*$a*$c;
            $resta = $primeraOperacion - $segundaOperacion;
            if ($resta <0){
                throw new Exception("La raiz no se puede hacer");
            }
            $raiz = sqrt($resta);
            $mult2a = $a * 2;

            $xPositiva = ($bNegativa + $raiz)/$mult2a;
            $xNegativa = ($bNegativa - $raiz)/$mult2a;

            $array = array($xPositiva, $xNegativa);
            return $array;

    }
    try {
        $array = ecuacion(2, 2, -6);
        for ($i=0; $i < count($array); $i++) { 
            echo "Resultado: ". $i+1 . " : ". $array[$i]."<br>";
        }
            
        }catch (Exception $e) {
        echo "Excepcion: ". $e->getMessage()."<br>";
    }
    
?>