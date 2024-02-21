<?php
require_once "src/Equipo.php";
require_once "bootstrap.php";
$id = $_GET['id'];
/*buscar el jugador con el id indicado*/
$equipo = $entityManager->find ("Equipo", $id); 
if(!$equipo){
    echo "Equipo no encontrado";
}else{
    $entityManager->remove($equipo);
    $entityManager->flush ( ); 
    echo "Equipo borrado";
}

?>