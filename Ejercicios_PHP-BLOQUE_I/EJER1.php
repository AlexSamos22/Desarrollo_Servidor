<?php
    $precioNormal = 400.00;
    $porcentajeRebaja = 50.00;
    $descuentoAplicado = $precioNormal*($porcentajeRebaja/100);
    $precioRebajado = $precioNormal - $descuentoAplicado;   

    echo "El precio normal del articulo: $precioNormal euros <br>";
    echo "El porcentaje de rebaja aplicado: $porcentajeRebaja % <br>";
    echo "Descuento aplicado: $descuentoAplicado euros <br>";
    echo "Precio final del articulo: $precioRebajado euros <br>";
?>