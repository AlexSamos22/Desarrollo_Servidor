<?php
if (isset($_POST['primerNumero']) && isset($_POST['segundoNumero']) && isset($_POST['operacion'])) {
    $numero1 = $_POST['primerNumero'];
    $numero2 = $_POST['segundoNumero'];
    $op = $_POST['operacion'];
    $resultado = 0;
    switch($op){
        case "sumar":
            $resultado = $numero1 + $numero2;
            break;
        case "restar":
            $resultado = $numero1 - $numero2;
            break;
        case "multiplicar":
            $resultado = $numero1 * $numero2;
            break;
        case "dividir":
            if($numero2 == 0){
                $resultado = "no se puede dividir por 0";
            }else{
                $resultado = $numero1 / $numero2;
            }
            break;
        }
        echo $resultado;

}else{
    echo "hola";
}
   
?>