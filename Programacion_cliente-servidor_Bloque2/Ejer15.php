
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $numero = $_POST['num'];
        for ($i = 2; $i <= $numero; $i++) {
            while ($numero % $i == 0) {
                echo $i;
                $numero /= $i;

                if ($numero != 1) {
                    echo " x ";
                }
            }
        }
        echo "<br>";
        echo "<a href='Ejer15.php'>Volver</a>";
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
                    <h1>Indique el numero para ver sus factores primos</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
                    method="post"> 
                        <label for="num">Indique el numero</label>
                        <input  name="num" id="num" type="number" required>
                        <input type="submit">
                    </form>
            </body>
        </html>
   <?php }?>


