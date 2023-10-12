<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $clave = "1234abc";
        if (isset($_POST['clave']) and !empty($_POST['clave'])) {
            if ($_POST['clave'] == $clave)  {
                echo "La contraseña es correcta<br>";
                echo "<a href='Ejer8.php'> Volver </a>";
            }else{
                echo "Revise la contraseña<br>";
                echo "<a href='Ejer8.php'> Volver </a>";
            }
        }else{
            echo "Se dejo el campo de la contraseña vacio <br>";
            echo "<a href='Ejer8.php'> Volver </a>";
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
                        <label for="clave">Contraseña</label>
                        <input name="clave" id="clave" type="text" >
                        <input type="submit">
                    </form>

                </body>
            </html>
 <?php   } ?>
    


