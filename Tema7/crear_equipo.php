<?php
require_once "src/Equipo.php";
require_once "bootstrap.php";

$nuevo= new Equipo();
$nuevo->setNombre("Granada");
$nuevo->setFundacion(1950);
$nuevo->setSocios(8000);
$nuevo->setCiudad("Granada");
$entityManager->persist($nuevo);
$entityManager->flush();
 echo "Equipo insertado ". $nuevo->getId(). "\n";
?>