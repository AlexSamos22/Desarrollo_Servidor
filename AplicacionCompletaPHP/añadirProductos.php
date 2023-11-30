<?php
    include "funciones.php";
    comprobar_sesion();
    include "cabecera.php";


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombre = $_POST['nombre'];
        $stock = $_POST['Stock'];
        $precio = $_POST['precio'];
        $cat = (int) $_POST['cat'];

       $comprobar = anadirProducto($nombre, $stock, $precio, $cat);

       if ($comprobar) {
            echo "Producto añadido correctamente<br>";
       }else{
        echo "Ha habido un error";
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
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text">
            <label for="Stock">Stock</label>
            <input id="Stock" name="Stock" type="number" min="1">
            <label for="precio">Precio</label>
            <input id="precio" name="precio" type="number" min="1">
            <label for="cat">Categoria</label>
            <select id="cat" name="cat">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
            <br>
            <input type="submit" value="Añadir Productos">
            <br>
        </form>
        
    </body>
</html>