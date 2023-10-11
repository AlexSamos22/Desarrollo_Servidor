<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['radio']) and !empty($_POST['radio'])) {
            $areaCirculo = pi() * ($_POST['radio']*2);
            echo "El area del circulo es: ". round($areaCirculo, 2);
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
            <label for="radio">Introduce el radio del cirdulo</label>
            <input name="radio" id="radio"  type="number">
            <input type="submit">
        </form>

    </body>
</html>