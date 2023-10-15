<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['hora'])) {
           $hora =  $_POST['hora'];
           $separarPartes = explode(":", $hora);
           $horas = (int) $separarPartes[0];
           $minutos = (int) $separarPartes[1];
           $segundos = (int) $separarPartes[2];

            if ($horas >= 0 && $horas <= 23 && $minutos >= 0 && $minutos <= 59 && $segundos >= 0 && $segundos <= 59) {
                echo "Hora valida <br>";
                echo "<a href='Ejer4.php'>Volver</a>";
            }else{
                echo "Hora invalida <br>";
                echo "<a href='Ejer4.php'>Volver</a>";
            }

        }else{
            echo "<a href='Ejer4.php'>Volver</a>";
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
                <label for="hora">Introduzca una hora(H:M:S)</label>
                <input id="hora" name="hora" type="text" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>