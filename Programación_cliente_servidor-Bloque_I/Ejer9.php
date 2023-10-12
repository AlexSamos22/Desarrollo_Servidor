<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $numeroCifras = 0;
        if (isset($_POST['num']) and !empty($_POST['num'])) {
           if ($_POST['num'] >= 0) {
                for ($i=1; $i <= strlen($_POST['num']) ; $i++) { 
                    $numeroCifras ++;
                }
                echo "El numero ". $_POST['num']. " tiene $numeroCifras cifras<br>";
                echo "<a href='Ejer9.php'> Volver </a>";
           }else{
                echo "El numero no puede ser negativo<br>";
                echo "<a href='Ejer9.php'> Volver </a>";
           }
        }else{
            echo "Se dejo el campo vacio <br>";
            echo "<a href='Ejer9.php'> Volver </a>";
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                    method="post">
                        <label for="num">Numero entero positivo</label>
                        <input name="num" id="num" type="number">
                        <input type="submit">
                    </form>
                </body>
            </html>

 <?php  } ?>
    


