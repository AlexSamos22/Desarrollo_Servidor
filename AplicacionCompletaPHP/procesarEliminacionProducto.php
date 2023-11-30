<?php
include "funciones.php";
comprobar_sesion();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = $_POST['nombre'];
    $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);

    
    $eliminacion = "DELETE from producto where nombre = '$nombre'";

    $result = $bd->query($eliminacion);

    if ($result) {
        echo "Eliminacion realizada con exito<br>";
        echo "<a href='eliminarProducto.php'>Volver</a>";
    }else{
        echo "Ha ocurrido un error<br>";
        echo "<a href='eliminarProducto.php'>Volver</a>";
    }
}
?>