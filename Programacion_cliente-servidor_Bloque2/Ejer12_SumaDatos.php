 <?php
    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $filas = $_POST['filas'];
        $columnas = $_POST['columnas'];
        $matriz = $_POST['dato'];
    }
    $mediaFila = 0;
    $medias = array();
    
    for ($i=0; $i < $filas; $i++) { 
        $sum = 0;
        for ($j=0; $j < $columnas; $j++) { 
            $sum += $matriz[$i][$j];
        }
        echo "La suma de la fila: ".  $i + 1 . " es: ". $sum . "<br>";
    }
            
?>