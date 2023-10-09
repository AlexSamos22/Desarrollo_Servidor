<?php
    $nota1 = 4;
    $nota2 = 5;
    $nota3 = 8;

    $media = ($nota1 + $nota2 + $nota3) /3;
     if ($media == 0 or $media == 1 or $media == 2 or $media == 3 or $media == 4){
        echo "La media: $media esta suspensa";
     }else{
        echo "La media: $media esta aprobada";
     }
?>