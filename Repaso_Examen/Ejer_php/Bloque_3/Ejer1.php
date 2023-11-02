<?php
/*
Realiza un programa con una función que calcule una ecuación de segundo grado, ax2 +
bx + c = 0 (las variables se inicializan de forma aleatoria o en el paso de parametros). Si
la ecuación no tiene solución debe devolver un mensaje de error.
*/

function ecuacion($a, $b, $c){
    $positivo = 0;
    $negativo = 0;

    $primeraOperacion = $b*$b;
    $segundaOperacion = 4*$a*$c;
    $resta = $primeraOperacion - $segundaOperacion;
    if ($resta < 0) {
        return "La ecuacion no tiene solucion";
    }
    $raiz = sqrt($resta);
    $division = 2*$a;

    $positivo = (-$b+$raiz) / $division;
    $negativo = (-$b-$raiz) / $division;

    $resultado = "Los resultados son: <br>". $positivo. "<br>" . $negativo;

    return $resultado;
}

echo ecuacion(2,2,-6);
?>