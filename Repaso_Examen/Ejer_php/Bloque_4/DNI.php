<?php
class DNI{
   private array $listaLetrasDni = array(0 => "T", 1 => "R", 2 => "W", 3 => "A", 4 => "G", 
                        5 => "M", 6 => "Y", 7 => "F", 8 => "P", 9 => "D", 10 => "X", 
                        11 => "B", 12 => "N", 13 => "J", 14 => "Z", 15 => "S", 16 => "Q", 
                        17 => "V", 18 => "H", 19 => "L", 20 => "C", 21 => "K", 22 => "E",
                        23 => "T");
    private int $DNI;

    public function __construct(int $dni){
        $this->DNI=$dni;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function letraDNI() {
        $result = $this->DNI % 23;
        return $this->listaLetrasDni[$result];
    }

}

?>