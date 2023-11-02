<?php
/*
Haz un programa que, teniendo tres números con decimales: precioNormal,
porcentajeRebaja y precioRebajado, muestre por pantalla el precio normal y el
rebajado, tras haber aplicado el porcentaje de descuento indicado en la variable
porcentajeRebaja. La salida del programa deberá tener el siguiente formato:
*Precio normal del artículo: …… euros
*Porcentaje de rebaja aplicado: ….. %
*Descuento aplicado: …… euros
*Precio final del artículo: ……. Euros
*/

$precioNormal = 600;
$porcentajeRebaja = 50;
$precioRebajado = 0;

echo "Precio normal del articulo: ". $precioNormal. " euros <br>";
echo "Porcentaje de rebaja aplicado: ". $porcentajeRebaja / 100 . " % <br>";
echo "Descuento aplicado: ". $precioNormal * ($porcentajeRebaja/100). " euros <br>";
echo "Precio final del articulo: ". $precioNormal - ($precioNormal * ($porcentajeRebaja/100)). " euros";

?>