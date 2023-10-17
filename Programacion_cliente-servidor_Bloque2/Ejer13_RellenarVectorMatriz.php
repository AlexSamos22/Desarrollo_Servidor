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
            if (isset($_POST['n']) and isset($_POST['v'])) {
                $n = $_POST['n'];
                $v = $_POST['v'];
        echo "<h1>Valores del vector</h1><br>";
         echo "<form method='post' action='Ejer13_MostrarResultados.php'>"; 
         echo"<table border='1'>";
         echo "<tr>";
         for ($i = 0; $i < $v; $i++) {
             
             echo "<td><input type='number' name='vector[$i]'></td>";
         }
         echo "</tr>";
         
         echo  "</table>";

         echo "<br>";
         echo "<h1>Valores de la matriz</h1><br>";
         echo"<table border='1'>";
                
                for ($i = 0; $i < $n; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $n; $j++) {
                        echo "<td><input type='number' name='dato[$i][$j]'></td>";
                    }
                    echo "</tr>";
                }
                
          echo  "</table>";
          echo "<input  type='hidden' value='$n' name='n'>";
          echo "<input  type='hidden' value='$v' name='v'>";
          echo " <input type='submit' value='Enviar datos'>" ;
          echo" </form>";
    ?>

        </body>
    </html>

<?php
    }
}
        
?>