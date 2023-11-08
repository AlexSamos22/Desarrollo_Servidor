<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numero_binario = $_POST['binario'];
    $longitud = strlen($numero_binario);
    $numero_decimal = 0;

    for ($i = 0; $i < $longitud; $i++) {
        $digito = $numero_binario[$longitud - $i - 1];
        if ($digito === '1') {
            $numero_decimal += pow(2, $i);
        }
    }
    echo "Número binario: $numero_binario<br>";
    echo "Número decimal: $numero_decimal";
}
?>

