<?php
include "DNI.php";
/*
Crea la clase Persona, que representa a una persona

Para la clase DNI se puede usar la que hemos hecho en la relación anterior

Usar la clase Persona para crear un objeto con una persona que llame “Pepe
Pérez” con un DNI cuyo número es “77558877” y al que hay que calcular la letra,
una edad de 56 años y un sueldo de 1500€
*/
class Persona{
    private String $nombre;
    private DNI $DNI;
    private int $edad;
    private int $sueldo;

    public function __construct(String $nombre, DNI $DNI, int $edad, int $sueldo){
        $this->nombre=$nombre;
        $this->DNI=$DNI;
        $this->edad=$edad;
        $this->sueldo=$sueldo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function esMayorEdad(){
        if ($this->edad >= 18 ) {
            return true;
        }
        return false;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function getSueldo(){
        return $this->sueldo;
    }
    public function setSueldo(int $salario){
        $this->sueldo=$salario;
    }
    public function setEdad(int $edad){
        $this->edad=$edad;
    }
}
$DNI = new DNI(77558877);
$persona = new Persona("Pepe Perez", $DNI, 56, 1500);
$letraDNI= $DNI->letraDNI();
$dniUser = (int) $DNI->getDNI();

echo "La persona con nombre ". $persona->getNombre(). " y DNI ".$dniUser.$letraDNI; 
?>