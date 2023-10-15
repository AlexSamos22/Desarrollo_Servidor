<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['caract'])){
            $caracter = $_POST['caract'];
            if(strlen($caracter) == 1){
                if (ctype_upper($caracter)) {
                    echo "El caracter $caracter es una mayúscula <br>";
                } elseif (ctype_lower($caracter)) {
                    echo "El caracter $caracter es una minúscula <br>";
                } elseif (ctype_digit($caracter)) {
                    echo "El caracter $caracter es un dígito <br>";
                } elseif (ctype_punct($caracter)) {
                    echo "El caracter $caracter es un signo de puntuación <br>";
                } else {
                    echo "El caracter $caracter es un carácter especial <br>";
                }
                echo "<a href='Ejer6.php'>Volver</a>";
            }else{
                echo "Solo se puede introducir un caracter <br>";
                
            }
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
                <label for="caract">Introduce un solo caracter</label>
                <input id="caract" name="caract" type="text" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>