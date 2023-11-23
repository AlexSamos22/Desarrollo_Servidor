<?php
    include "funciones.php";

    comprobar_sesion();
    
    include "cabecera.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $cont = $_POST['cont'];

        $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        try {
            $db = new PDO($res[0], $res[1], $res[2]);
            $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);

            $ins = "INSERT INTO administrador(nombre, apellidos, correo, contraseña) values('$nombre', '$apellidos', '$correo', '$contrasenaCifrada')";

            $result = $db->query($ins);

            if ($result) {
                echo "Administrador añadido con exito";
            }else{
                echo "Algo ha salido mal";
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
