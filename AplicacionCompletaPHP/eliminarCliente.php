<?php
    include "funciones.php";

    comprobar_sesion();
    
    include "cabecera.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $correo = $_POST['correo'];

        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        try {
            $db = new PDO($res[0], $res[1], $res[2]);

            $del = "DELETE FROM cliente where correo = '$correo'";

            $result = $db->query($del);

            if ($result->rowCount() > 0) {
                echo "Cliente eliminado con exito<br>";
                echo "<a href='modUsuarios.php'>Volver</a>";
            }else{
                echo "Algo ha salido mal<br>";
                echo "<a href='modUsuarios.php'>Volver</a>";
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
