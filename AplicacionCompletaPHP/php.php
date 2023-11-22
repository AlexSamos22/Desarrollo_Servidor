<?php
include "funciones.php";


    $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
    

    try {
        $db = new PDO($res[0], $res[1], $res[2]);
        $contrasenaCifrada = password_hash(1234, PASSWORD_DEFAULT);

        $ins = "UPDATE administrador set contraseña = '$contrasenaCifrada' where nombre = 'Alex'";

        $result = $db->query($ins);

        if ($result) {
            echo "Usuario añadido con exito";
        }else{
            echo "Algo ha salido mal";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


?>