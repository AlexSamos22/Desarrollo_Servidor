<?php
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
            $filas = $_POST['filas'];
            $columnas = $_POST['columnas'];
            $matriz = $_POST['dato'];
            
            $nombresCampos = array();
    
            for ($i = 0; $i < $filas; $i++) {
                for ($j = 0; $j < $columnas; $j++) {
                   $matriz[$i][$j] = (int)$matriz[$i][$j];
                }
            }
    
            echo print_r($matriz);
        }
       
      
?>