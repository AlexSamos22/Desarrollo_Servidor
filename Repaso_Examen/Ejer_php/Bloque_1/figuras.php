<?php
$cuadrado = "";
$triangulo = "";
$rombo = "";

for ($i= 1; $i <= 6; $i++) { 
    for ($j=1; $j <= 6 ; $j++) { 
        $cuadrado .= "ç";
    }
    $cuadrado .= "<br>";
}

for ($i= 1; $i <= 6; $i++) { 
    for ($j=1; $j <= 6 - $i ; $j++) { 
        $triangulo.= "&nbsp";
    }
    for ($k=1; $k <= $i * 2 - 1 ; $k++) { 
     $triangulo.= "ç";
    }
    $triangulo.= "<br>";
}

for ($i= 1; $i <= 6; $i++) { 
    for ($j=1; $j <= 6 - $i ; $j++) { 
        $rombo.= " ";
    }
    for ($k=1; $k <= $i * 2 - 1 ; $k++) { 
     $rombo.= "ç";
    }
    $rombo.= "<br>";
}

for ($i = 6; $i >= 1; $i--) { 
    for ($j=1; $j <= 6 - $i ; $j++) { 
        $rombo.= " ";
    }
    for ($k=1; $k <= $i * 2 - 1 ; $k++) { 
     $rombo.= "ç";
    }
    $rombo.= "<br>";
}


echo $cuadrado;

echo "<br>";

echo $triangulo;

echo "<br>";

echo $rombo;
?>