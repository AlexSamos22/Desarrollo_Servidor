<?php
if(isset($_COOKIE['idioma']) and $_COOKIE['idioma'] == "Esp"){
    echo "Pagina en español";
    echo "Seleccione idioma";
}else{
    echo "English page";
    echo "Select lenguage";
}
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
        <form action="php.php" method="post">
            <select name = "idioma">
                <option value="Esp">Español</option>
                <option value="Ing">Ingles</option>
            </select>
            <input type="submit">
        </form>
    </body>
</html>