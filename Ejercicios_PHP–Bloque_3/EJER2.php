<?php
      include "../librerias/Potencia.php";
      
      $suma = 0;
      for ($i = 5; $i <= 13 ; $i++) { 
        $suma += potencia($i);
      }

      echo "La suma de los cuadrados es: $suma";
?>