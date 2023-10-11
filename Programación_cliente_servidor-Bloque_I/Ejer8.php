<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $clave = "1234abc";
        if (isset($_POST['clave']) and !empty($_POST['clave'])) {
            if ($_POST['clave'] == $clave)  {
                echo "La contraseña es correcta";
            }else{
                $err = true;
            }
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
        <?php
            if (isset($err)) {
                echo "<p> Revise la contraseña </p>";
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="post">
            <label for="user">Usuario</label>
            <input name="user" id="user" type="text">
            <label for="clave">Contraseña</label>
            <input name="clave" id="clave" type="text" >
            <input type="submit">
        </form>

    </body>
</html>