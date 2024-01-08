<?php
include "funciones.php";

comprobar_sesion();

include "cabecera.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $codigo = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $cont = $_POST['cont'];

    $res = configuracionBaseDatos(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");

    try {
            $db = new PDO($res[0], $res[1], $res[2]);

            $comprobarExistencia = "SELECT ID_Admin, nombre, apellidos, correo, contraseña FROM administrador where ID_Admin = '$codigo'";
            $existe = $db->query($comprobarExistencia);

            foreach ($existe as $row) {
                if ($nombre === $row['nombre'] and $apellidos === $row['apellidos'] and $correo === $row['correo'] and password_verify($cont, $row['contraseña'])) {
                    echo "Ningun dato se actualizara todos los datos son iguales";
                }else{
                    echo "Hay campos distintos se actualizaran....<br>";
                    $contrasenaCifrada = password_hash($cont, PASSWORD_DEFAULT);
                    $upd = "UPDATE administrador set nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', contraseña = '$contrasenaCifrada'  WHERE ID_Admin = '$codigo'";

                    $result = $db->query($upd);

                    if ($result) {
                        echo "Actualizacion realizada con exito<br>";
                        echo "<a href='modUsuarios.php'>Volver</a>";
                    }else{
                        echo "No se puedo actualizar ha ocurrido un error<br>";
                        echo "<a href='modUsuarios.php'>Volver</a>";
                    }
                }
            }
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}   
?>
