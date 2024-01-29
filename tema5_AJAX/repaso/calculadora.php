<?php
if (isset($_POST['primerNumero']) && isset($_POST['segundoNumero']) && isset($_POST['operacion'])) {
    $primerNumero = $_POST['primerNumero'];
    $segundoNumero = $_POST['segundoNumero'];
    $operacion = $_POST['operacion'];
    $resultado = 0;
    switch($operacion){
        case "suma":
            $resultado = intval($primerNumero) + intval($segundoNumero);
            break;
        case "resta":
            $resultado = intval($primerNumero) - intval($segundoNumero);
            break;
        case "mul":
            $resultado = intval($primerNumero) * intval($segundoNumero);
            break;
        case "div":
            $resultado = intval($primerNumero) / intval($segundoNumero);
            break;
    }
    
    // Devolver el resultado como respuesta AJAX
    echo $resultado;
} else {
    // Manejar el caso en el que no se proporcionan los parámetros esperados
    echo "Error: Parámetros no proporcionados.";
}
?>
