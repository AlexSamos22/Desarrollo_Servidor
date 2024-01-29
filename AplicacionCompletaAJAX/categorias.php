<?php	
	require 'bd.php';	

	if(!comprobar_sesion()) {
        return;
    }
	$categorias = cargar_categorias();
	$cat_json = [];
    
    foreach ($categorias as $value) {
        array_push($cat_json, array("cod" => $value["id_cat"], "nombre" => $value["nombre"]));
    };
    $json = json_encode($cat_json);
	echo $json;
?>