<?php
include "ClassDNI.php";
class Persona {
    private string $nombre;
    private DNI $DNI;
    private int $edad;
    private int $sueldo;

    public function __construct(string $nombre, DNI $DNI, int $edad, int $sueldo){
        $this->nombre = $nombre;
        $this->DNI = $DNI;
        $this->edad = $edad;
        $this->sueldo = $sueldo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function esMayorEdad(){
        if($this->edad >= 18){
            return TRUE;
        }
        return FALSE;
    }

    public function getEdad(){
        return $this->edad;
    }

    public function getSueldo(){
        return $this->sueldo;
    }

    public function setSueldo(int $sueldo){
        $this->sueldo = $sueldo;
    }

    public function setEdad(int $edad){
        $this->edad = $edad;
    }

}


$dni = new DNI(77021250);
$persona = new Persona("Pepe Perez", $dni, 56, 1500);
$personaDNI = $dni ->getDNI();
$letraDNI = $dni ->restoDNI($personaDNI);
$nombrePersona = $persona->getNombre();
echo "El DNI:  $personaDNI de $nombrePersona tiene la letra: $letraDNI <br>";

?>
