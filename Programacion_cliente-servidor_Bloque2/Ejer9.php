<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['numero'])){
            $numero = $_POST['numero'];
            $numeroInvertido = "" ;

            for ($i=strlen($numero) - 1; $i >= 0; $i--) { 
                $numeroInvertido .= $numero[$i];
            }

            echo "El numero es $numero y invertido es: $numeroInvertido <br>";
            echo "<a href='Ejer9.php'>Volver</a>";
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
                <label for="numero">Introduce un numero entero</label>
                <input id="numero" name="numero" type="number" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>