<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['tiempo'])) {
            $tiempo = $_POST['tiempo'];
            $precioTotal = 0.10;
            
            if($tiempo < 3){
                echo "El precio de su llamada es 0.10 centimos<br>";
            }else{
                for ($i=1; $i <= $tiempo - 3 ; $i++) { 
                    $precioTotal += 0.05;
                }
                echo "El precio de su llamada es: $precioTotal <br>";
            }
            echo "<a href='Ejer2.php'>Volver</a>";

        }else{
            echo "<a href='Ejer2.php'>Volver</a>";
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
                <label for="horaSegundos">¿Cuanto tiempo a durado la llamada?</label>
                <input id="tiempo" name="tiempo" type="datetime" required>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>