<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['euros']) and !empty($_POST['euros'])) {
            if(is_numeric($_POST['euros']) and $_POST['euros'] >= 0){
                $pesetas = 166.386;
                $conversion = $pesetas * $_POST['euros'];
                echo "Los " .$_POST['euros'] . "de euros son ".  round($conversion, 2);
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
                echo "<p> Debes introducir un numero valido </p>";
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        method="post">
            <label for="euros">Introduce una cantidad de euros</label>
            <input name="euros" id="euros" type="text">
            <input type="submit">
        </form>

    </body>
</html>