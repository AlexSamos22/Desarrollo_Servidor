<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['frase']) and !empty($_POST['frase'])) {
          $fraseSinEspacios = str_replace( " ", "", $_POST['frase']);

          echo "Frase sin espacios: ";
          echo $fraseSinEspacios;
        }
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

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="post">
            <label for="frase">Introduce una frase</label>
            <input name="frase" id="frase" type="text">
            <input type="submit">
        </form>

    </body>
</html>