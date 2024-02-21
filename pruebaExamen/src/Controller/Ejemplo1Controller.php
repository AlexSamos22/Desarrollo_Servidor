<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Ejemplo1Controller extends AbstractController
{
    //#[Route('/ejemplo1', name: 'app_ejemplo1')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Ejemplo1Controller.php',
        ]);
    }

    public function mult($num1, $num2): Response{
        $producto = $num1 * $num2;
        return new Response("<html><body>". $producto ."</body></html>");
    }

    public function defecto($num1 = 3): Response{
        return new Response("<html><body>". $num1 ."</body></html>");
    }

    public function cuadrado($num){
        return $this->redirectToRoute('mult', array('num1' => $num, 'num2' => $num));
    }

    public function saludo($nombre){
        return $this->render(("saludo.html.twig"),[
            "nombre" => $nombre
        ]);
    }

    public function condicional($numero){
        return $this->render(("condicional.html.twig"),[
            "numero" => $numero
        ]);
    }

    public function tabla($numero){
        return $this->render(("tabla.html.twig"),[
            "numero" => $numero
        ]);
    }    
    
    public function mostrarTabla($tabla){
       if ($tabla == "empleados") {
            $datos = $this->forward('App\Controller\EmpleadosController::getEmpleados');
       }else{
            $datos = $this->forward('App\Controller\JugadoresController::getJugadores');
       }

       return $datos;
    }


    public function primos($limite){
        $primos = [];
        $contador = 0;
        for ($i=2; $i <= $limite; $i++) { 
            for ($j=1; $j <= $i; $j++) { 
                if ($i % $j == 0) {
                    $contador ++;
                }
            }
            if ($contador == 2) {
                array_push($primos, $i);
            }
            $contador = 0;
        }

        return $this->render(('primos.html.twig'),[
            'limite' => $limite,
            'primos' => $primos
        ]);
    }
}
