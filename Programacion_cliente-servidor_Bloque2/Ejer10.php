<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if (isset($_POST['numero'])){
            $numero = (int) $_POST['numero'];
            
            if($numero > 0){
                for ($i=0; $i < $numero; $i++) { 
                    for ($j=0; $j < $i + 1 ; $j++) { 
                        echo "*";
                    }
                    echo "<br>" ;
                }
                echo "<a href='Ejer10.php'>Volver</a>";
            }else{
                echo "El numero debe ser mayor a 0 <br>";
                echo "<a href='Ejer10.php'>Volver</a>";
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
                <label for="numero">Introduce un numero entero</label>
                <input id="numero" name="numero" type="number" required>
                <br>
                <input type="submit">
            </form>
        </body>
    </html>
  <?php  }?>