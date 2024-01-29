<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $palabra = $_POST['palabra'];
    $frase = $_POST['frase'];
    $array = explode(" ", $frase);
    $contador = 0;

    for ($i=0; $i < count($array) ; $i++) { 
        $aux = $array[$i];
        if (strpos($aux, $palabra) >= 0 && !is_bool(strpos($aux, $palabra))) {
            $contador ++;
        }
    }

    echo $contador;
}
?>
