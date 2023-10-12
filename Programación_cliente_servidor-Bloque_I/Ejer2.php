<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['nombre']) and !empty($_POST['nombre'])) {
            echo "Bienvenido ". $_POST['nombre']. "<br>";
            echo "<a href='Ejer2.php'> Volver </a>";
        }else{
            echo "Debes introducir un nombre en el formulario <br>";
            echo "<a href='Ejer2.php'> Volver </a>";
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
                        <input name="nombre" id="nombre" type="text">
                        <input type="submit">
                    </form>

                </body>
            </html>
    <?php } ?>


