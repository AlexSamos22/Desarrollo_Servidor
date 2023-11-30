<?php
    include "funciones.php";
    comprobar_sesion();
    include "cabecera.php";


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $cat = (int) $_POST['cat'];

       $productos = eliminarProducto($cat);

       echo "Los productos que puedes eliminar de la categoria $cat son: <br>";

       foreach ($productos as $producto) {
            echo $producto['nombre']. "<br>";
       }

       echo "<form method='POST' action='procesarEliminacionProducto.php'>";
        echo "<label for='nombre'>Nombre del Producto</label>";
        echo "<input id='nombre' name='nombre' type='text'>";
        echo "<input type='submit' value='Eliminar'>";
    echo "</form>";



    }else {?>
        
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
                            <label for="cat">Elija la categoria del producto que quiere eliminar</label>
                            <select id="cat" name="cat">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <br>
                            <input type="submit" value="Enviar">
                            <br>
                        </form>
                        
                    </body>
                </html>
  <?php  } ?>
