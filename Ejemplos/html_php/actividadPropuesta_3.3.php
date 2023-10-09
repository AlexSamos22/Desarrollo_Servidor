<?php
    if (isset($_COOKIE['idioma'])  && $_COOKIE['idioma'] == "esp") {
        echo "Esto es una pagina en español<br>";
        echo "Selecciona el idioma";
    }else{
        echo "This is a page in english<br>";
        echo "Select lenguage";
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        
        <form action="idioma.php" method="post">
            <select name = "idioma">
                <option value="esp">Español</option>
                <option value="ing">Ingles</option>
            </select>
            <input type="submit">
        </form>
        
        
    </body>
</html>