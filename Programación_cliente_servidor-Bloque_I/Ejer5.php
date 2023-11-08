<?php
    define("IVA", 21);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['num']) and !empty($_POST['num'])) {
            if (is_numeric($_POST['num'])) {
                $importeIVA = $_POST['num'] * (IVA / 100) ;
                $precioConIVA = $_POST['num'] + $importeIVA; 
                echo "El precio: ". $_POST['num'] . " con un IVA del: ". IVA. "es: $precioConIVA <br>" ;
                echo "<a href='Ejer5.php'> Volver </a>";
            }else{
                echo "Ese valor no es un numero <br>";
                echo "<a href='Ejer5.php'> Volver </a>";
            }
           
        }else{
            echo "Se dejo el campo vacio <br>";
            echo "<a href='Ejer5.php'> Volver </a>";
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
                    <label for="num">Introduce un numero</label>
                    <input name="num" id="num" type="text">
                    <input type="submit">
                </form>

            </body>
        </html>

  <?php  } ?>


