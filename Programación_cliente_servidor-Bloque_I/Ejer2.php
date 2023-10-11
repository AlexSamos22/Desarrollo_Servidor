<?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET['nombre']) and !empty($_GET['nombre'])) {
            echo "Bienvenido ". $_GET['nombre'];
        }else{
            echo "Debes introducir un nombre en el formulario";
        }
    }
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
        method="get">
            <input name="nombre" id="nombre" type="text">
            <input type="submit">
        </form>

    </body>
</html>