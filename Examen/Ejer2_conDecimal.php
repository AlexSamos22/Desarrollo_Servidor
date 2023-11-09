<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numero_decimal = $_POST['decimal']; 
    $numero_binario = "";
    $aux = $_POST['decimal'];

    while ($numero_decimal > 0) {
        $resto = $numero_decimal % 2; 
        $numero_binario .= $resto. " "; 
        $numero_decimal = intval($numero_decimal / 2);    
    }

    $arrayNumeroBinario = explode(" ", $numero_binario);
    $arr = array_reverse($arrayNumeroBinario);

    echo "El numero $aux en binario es: ";
    foreach ($arr as $value) {
        echo $value;
    }
}
?>