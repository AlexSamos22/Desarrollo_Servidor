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
                $n = $_POST['n'];
                $v = $_POST['v'];
                $vector = $_POST['vector'];
                $matriz = $_POST['dato'];
            
                $vectorTexto = implode(" ", $vector);
            
            
            for ($i=0; $i < $n; $i++) { 
                $matrizTexto  = implode(" ", $matriz[$i]);
                    if (strpos($matrizTexto, $vectorTexto ) >= 0 && !is_bool(strpos($matrizTexto,$vectorTexto ))) {
                        echo "El vector esta en la fila $i y empieza en la columna ". strpos($matrizTexto,$vectorTexto ). "<br>";
                    }
            }
        }
        ?>
    </body>
</html>