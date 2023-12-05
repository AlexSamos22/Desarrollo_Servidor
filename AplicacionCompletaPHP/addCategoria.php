<?php
    include "funciones.php";
    comprobar_sesion();
    include "cabecera.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombre = $_POST['nombre'];

        $add = add_Cat($nombre);

        if ($add) {
            echo "Categoria añadida correctamente <br>";
        }else{
            echo "Ha ocurrido algun error <br>";
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
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <label for="nombre">Nombre de la categoria</label>
            <input id="nombre" name="nombre" type="text">
            <input type="submit" value="Añadir categoria">
        </form>
    </body>
</html>