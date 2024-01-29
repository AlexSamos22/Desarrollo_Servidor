<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numero = $_POST['numero'];
    $unidad = $_POST['unidad'];
    $numero_decimal = 0;
    switch($unidad){
        case "decimal":
            $longitud = strlen($numero);

            for ($i = 0; $i < $longitud; $i++) {
                $digito = $numero[$longitud - $i - 1];
                if ($digito === '1') {
                    $numero_decimal += pow(2, $i);
                }
            }

            echo $numero_decimal;
            break;
        case "binario":
            $numero_decimal = $numero; 
            $numero_binario = "";

            while ($numero_decimal > 0) {
                $resto = $numero_decimal % 2; 
                $numero_binario .= $resto. " "; 
                $numero_decimal = intval($numero_decimal / 2);    
            }

            $arrayNumeroBinario = explode(" ", $numero_binario);
            $arr = array_reverse($arrayNumeroBinario);
            $string = "";
            foreach ($arr as $value) {
                $string .= $value;
            }
            echo $string;
            break;
    }
}
?>