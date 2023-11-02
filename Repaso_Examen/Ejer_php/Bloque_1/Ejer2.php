<?php
/*
Realiza un programa que teniendo las tres notas de los exámenes, nos muestre por
pantalla si su media le sale aprobado.
*/

$nota1 = 3;
$nota2 = 3;
$nota3 = 4;

if (($nota1+$nota2+$nota3) / 3 >= 5) {
    echo "La media esta aprobada";
}else{
    echo "La media esta suspensa";
}

?>