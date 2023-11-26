<?php
    include "funciones.php";

    comprobar_sesion();
    
    include "cabecera.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $correo = $_POST['correo'];

        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        try {
            $db = new PDO($res[0], $res[1], $res[2]);

            $del = "DELETE FROM administrador where correo = '$correo'";

            $result = $db->query($del);

            if ($result->rowCount() > 0) {
                echo "Administrador eliminado con exito";
            }else{
                echo "Algo ha salido mal";
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
