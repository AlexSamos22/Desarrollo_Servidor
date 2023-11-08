<?php
/*
EJERCICIO 2 (2,5 puntos): Realizar un programa que convierta un número
decimal en binario y un número binario en decimal, para ello tendremos
un formulario que nos pedirá el numero y el tipo de conversión.
*/

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h2>Selecciona la unidad a la que quieres convertir</h2>
        <form action="Ejer2_eleccion.php" method="post">
            <select name="conversion">
                <option value="binario">Binario</option>
                <option value="decimal">decimal</option>
            </select>
            <input type="submit">
        </form>
    </body>
</html>