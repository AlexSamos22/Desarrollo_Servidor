<?php
/*comprueba que el usuario haya abierto sesión o redirige*/ 
require 'sesiones.php';
require_once 'bd.php'; 
comprobar_sesion( );
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Lista de categorías</title>
    </head>
    <body>
        <?php require 'cabecera.php';?>
        <hl>Lista de categorías</hl>
        <!--lista de vínculos con la forma productos.php?categoria=l-->
        <?php
        $categorias = cargar_categorias();
        if($categorias===FALSE ){
            echo "<p class='error'>Error al conectar con la base datos</p> " ;
        }else{
            echo "<ul>"; //abrir la lista 
            foreach($categorias as $cat){
                /*$cat('nombre) $cat('codCat']*/
                $url = "productos.php?categoria=".$cat['codCat']; 
                echo "<li><a href='$url'>".$cat['nombre']. "</a></li>";
            }
            echo "</ul>";
        }
        ?>
    </body>
</html>
