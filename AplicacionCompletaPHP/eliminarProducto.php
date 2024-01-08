<?php
    include "funciones.php";
    comprobar_sesion();
    include "cabecera.php";


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $cat = (int) $_POST['cat'];

       $productos = eliminarProducto($cat);
       echo "<h2>Info Productos</h2><br>";
       echo "<table border='1'>";
       echo "<tr>";
       echo "<th>Codigo</th>";
       echo "<th>Nombre</th>";
       echo "<th>Stock</th>";
       echo "<th>Precio</th>";
       echo "<th>Categoria</th>";
       echo "</tr>";
   
       foreach ($productos as $row) {
           echo "<tr>";
           echo "<td>" . $row['ID_Producto'] . "</td>";
           echo "<td>" . $row['Nombre'] . "</td>";
           echo "<td>" . $row['Stock'] . "</td>";
           echo "<td>" . $row['Precio'] . "</td>";
           echo "<td>" . $row['ID_Cat'] . "</td>";
           echo "</tr>";
       }
   
       echo "</table>";

       echo "<form method='POST' action='procesarEliminacionProducto.php'>";
        echo "<label for='cod'>Codigo del producto</label>";
        echo "<input id='cod' name='cod' type='number' min='1'>";
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
                            <?php
                                $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
                                $bd = new PDO($res[0], $res[1], $res[2]);
                                
                                $id_Cat = "SELECT ID_Cat from categoria";

                                $result = $bd->query($id_Cat);
                                foreach ($result as $id) {
                                    $cat = $id['ID_Cat'];
                                    echo "<option value='$cat'>$cat</option>";
                                }
                            ?>
                            </select>
                            <br>
                            <input type="submit" value="Enviar">
                            <br>
                        </form>
                        
                    </body>
                </html>
  <?php  } ?>
