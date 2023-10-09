<?php
    $arra1 = [
        0 => 444,
        1 => 222,
        2 => 333,
    ];

    echo "<br>"."pos 0: ". $arra1[0]. "<br>";
    print_r($arra1);
    echo"<br>";
    $arra2 = [
        "1111A" => "Juan Vera Ochoa",
        "1112A" => "Maria Mesa Cabezal",
        "1113A" => "Ana Puertas Peral",
    ];

    foreach($arra2 as $nombre){
        echo "$nombre <br>";
    }

    foreach ($arra2 as $codigo => $nombre) {
        echo "Codigo: $codigo Nombre: $nombre <br>";
    }

    foreach ($arra2 as $codigo => $nombre) {
        echo "Codigo: $codigo <br>";
    }

    echo "<br>";
    
    //Arrays sin claves
    $arra3 = array(10, 20 ,30 ,40);
    print_r($arra3);
    echo "<br>";
    $arra3[] = 5;
    print_r($arra3);
    echo "<br>";
    $arra3[10] = 6;
    $arra3[] = 5;
    print_r($arra3);
?>