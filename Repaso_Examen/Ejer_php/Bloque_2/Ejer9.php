<?php
/*
Crear una matriz de dos dimensiones con un tamaño de 4x4 cuya diagonal sea 1 y el
resto de elementos sean 0, después recorrerla mostrando sus elementos, quedando
de la siguiente forma:
1 0 0 0
0 1 0 0
0 0 1 0
0 0 0 1
*/

$matriz = [
    [1, 0, 0, 0],
    [0, 1, 0, 0],
    [0, 0, 1, 0],
    [0, 0, 0, 1]
];

for ($i=0; $i < count($matriz) ; $i++) { 
    for ($j=0; $j < count($matriz[$i]) ; $j++) { 
        echo $matriz[$i][$j];
    }
    echo "<br>";
}

?>