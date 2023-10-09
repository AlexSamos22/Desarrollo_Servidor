<?php
    $arra1 = [
        "Viernes" => 22,
        "Sabado" => 34,
    ];

    /*No modifica el array*/
    foreach ($arra1 as $cantidad) {
        $cantidad = $cantidad * 2;
    }

    print_r($arra1);
    echo "<br>";

    /*modifica el array*/
    foreach ($arra1 as &$cantidad) {
        $cantidad = $cantidad * 2;
    }

    print_r($arra1);

    echo"<br>";
    /*Recorrerlo modificado*/
    foreach ($arra1 as $dia => &$cantidad) {
        echo "Dia: $dia, Cantidad: $cantidad";
    }
?>



