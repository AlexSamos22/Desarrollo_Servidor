<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['horaSegundos'])) {
            $segundos = $_POST['horaSegundos'];
            $minutos = 0;
            $horas = 0;

            while ($segundos >= 60) {
                if ($segundos >= 60) {
                    $minutos += 1;
                    $segundos -= 60;
                }

                if ($minutos >= 60) {
                    $horas += 1;
                    $minutos -= 60;
                }
            }

            echo "horas: $horas, minutos: $minutos, segundos: $segundos<br>";
            echo "<a href='Ejer1.php'>Volver</a>";

        }else{
            echo "Introduce un tiempo valido<br>";
            echo "<a href='Ejer1.php'>Volver</a>";
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
                <label for="horaSegundos">Indique los segundos</label>
                <input id="horaSegundos" name="horaSegundos" type="number" required>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>