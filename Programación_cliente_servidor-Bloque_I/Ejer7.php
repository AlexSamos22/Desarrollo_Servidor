<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['dia']) and !empty($_POST['dia'])) {
           switch(strtolower($_POST['dia'])){
            case "lunes":
                echo "El lunes es un dia laborable<br>";
                break;
            case "martes":
                echo "El martes es un dia laborable<br>";
                break;
             case "miercoles":
                echo "El miercoles es un dia laborable<br>";
                break;
            case "jueves":
                echo "El jueves es un dia laborable<br>";
               break;
            case "viernes":
                echo "El viernes es un dia laborable<br>";
                break;
            case "sabado":
                echo "El sabado no es un dia laborable<br>";
                break;
            case "domingo":
                 echo "El domingo no es un dia laborable<br>";
                break;
            default:
                echo "No es un dia de la semana<br>";
           }
           echo "<a href='Ejer7.php'> Volver </a>";
        }else{
            echo "Se dejo el campo vacio <br>";
            echo "<a href='Ejer7.php'> Volver </a>";
        }
    }else{
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
                        <label for="dia">Introduce un dia de la semana</label>
                        <input name="dia" id="dia" type="text">
                        <input type="submit">
                    </form>

                </body>
            </html>
  <?php  } ?>


