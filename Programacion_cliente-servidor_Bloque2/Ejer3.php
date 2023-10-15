<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['fecha1']) and isset($_POST['fecha2'])) {
           $fechaActual = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fecha1']);
           $fechaPartida = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['fecha2']);

           if (!$fechaActual || !$fechaPartida) {
                echo "Formato de fecha invalido. Usa YYYY-MM-DD HH:MM:SS<BR>";
                echo "<a href='Ejer3.php'>Volver</a>";
           }else{
                if ($fechaActual > $fechaPartida) {
                    echo "La fecha actual no puede ser mayor a la de paryida <br>";
                    echo "<a href='Ejer3.php'>Volver</a>";
                }else{
                    $horasSalida = $fechaActual->diff($fechaPartida);
                    $dias = $horasSalida->d;
                    $horas = $dias + 24 + $horasSalida->h;
                    $minutos = $horas * 60 + $horasSalida->i;
                    echo "Para la salida de su vuelo quedan $horas horas y $minutos minutos <br>";
                    echo "<a href='Ejer3.php'>Volver</a>";
                }
           }
          

        }else{
            echo "<a href='Ejer3.php'>Volver</a>";
        }
    }else{
?>
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
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
            method="post">
                <label for="fecha1">Fecha y hora actual</label>
                <input id="fecha1" name="fecha1" type="text" required>
                <br>
                <label for="fecha2">Fecha y hora de salida</label>
                <input id="fecha2" name="fecha2" type="text" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>