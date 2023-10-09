<?php
    include "Persona.php";
    class Futbolista extends Persona{
        private string $equipo;
        private string $posicion;

        function __construct(string $nombre, DNI $DNI, int $edad, int $sueldo, string $equipo, string $posicion){
            parent::__construct($nombre, $DNI, $edad, $sueldo);
            $this->equipo = $equipo;
            $this->posicion = $posicion;
        }

        public function getPosicion(){
            return $this->posicion;
        }
        public function getEquipo(){
            return $this->equipo;
        } 
    }

$dniFutbolista = new DNI(12345678);
$futbolista = new Futbolista("Raul Gonzales", $dniFutbolista, 23, 12000, "Real Madrid", "Delantero");

echo "El futbolista ".$futbolista->getNombre()." juega en la posicion ".$futbolista->getPosicion()." y es del equipo ".$futbolista->getEquipo();

?>