<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

        <?php
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $filas = $_POST['filas'];
                $columnas = $_POST['columnas'];
                $matriz = $_POST['dato'];
            }
            $mediaFila = 0;
            $medias = array();
            echo "<table border = '1'>";
            for ($i=0; $i < $filas; $i++) { 
                echo "<tr>";
                $sum = 0;
                for ($j=0; $j < $columnas; $j++) { 
                    echo "<td>" . $matriz[$i][$j]. "</td>";
                    $sum += $matriz[$i][$j];
                }

                $mediaFila = $sum / $columnas;
                $medias[]= $mediaFila;
                $mediaRedondeada = round($mediaFila, 1);
                echo "<td>$mediaRedondeada</td>";
                
                echo "<tr>";
            }
            echo "</table>";
        ?>

    </body>
</html>