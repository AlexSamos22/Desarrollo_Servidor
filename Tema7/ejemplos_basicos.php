<?php
    require_once "src/Equipo.php";
    require_once "bootstrap.php";

    $eq = $entityManager->find("Equipo", 1);

    echo $eq->getSocios();

    $eq->setSocios(70000);
    $entityManager->flush();

    $eq = $entityManager->find("Equipo", 4);
    if (!$eq) {
        echo "Equipo no encontrado";
    }
?>