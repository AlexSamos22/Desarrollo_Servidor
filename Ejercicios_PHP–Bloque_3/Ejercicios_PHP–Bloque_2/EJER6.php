<?php
    function convertir($cadena, $opcion){
        $letras = "";
        if($opcion == 0){
            for ($i=0; $i < strlen($cadena) ; $i++) { 

                if(ctype_lower($cadena[$i])){
                    $letras .= $cadena[$i];
                }else{
                    //Se le suma o resta 32 ya que en la tabla ASCCI las letras mayusculas y misculas estan a 32 de diferencia
                    $letras .= chr(ord($cadena[$i]) + 32);
                }
            }
        }else{
            for ($i=0; $i < strlen($cadena) ; $i++) {

                if(ctype_upper($cadena[$i])){
                    $letras .= $cadena[$i];
                }else{
                    $letras .= chr(ord($cadena[$i]) - 32);
                }
            }
        echo $letras;
        }
    }

    convertir("HOLAAsasaas", 3);
?>