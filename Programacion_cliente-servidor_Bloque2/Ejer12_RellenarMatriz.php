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
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['columna']) and isset($_POST['filas'])) {
                $filas = $_POST['filas'];
                $columnas = $_POST['columna'];
         echo "<form method='post' action='Ejer12_SumaDatos.php'>"; 
         echo"<table border='1'>";
                
                for ($i = 0; $i < $filas; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $columnas; $j++) {
                        echo "<td><input type='number' name='dato[$i][$j]'></td>";
                    }
                    echo "</tr>";
                }
                
          echo  "</table>";
          echo "<input  type='hidden' value='$filas' name='filas'>";
          echo "<input  type='hidden' value='$columnas' name='columnas'>";
          echo " <input type='submit' value='Enviar datos'>" ;
          echo" </form>";
    ?>

        </body>
    </html>

<?php
    }
}
        
?>