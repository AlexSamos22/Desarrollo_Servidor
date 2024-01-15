<?php
    $nombreCat = [];
    $cc = 'mysql:dbname=pedidos;host=127.0.0.1';
    $user = 'root';
    $clave = '';
    $bd = new PDO($cc, $user, $clave);

    $cat = "SELECT CodCat, nombre FROM categorias";

    $resul = $bd->query($cat);

    if (!$resul) {
        return FALSE;
    }else{
        foreach ($resul as $value) {
            array_push($nombreCat, array("Cod" => $value["CodCat"], "nombre" => $value["nombre"]));
        }
        $json = json_encode($nombreCat);
        echo $json;
    }
?>