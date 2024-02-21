<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class Ejemplo1Controller extends AbstractController
{
    #[Route('/ejemplo1', name: 'app_ejemplo1')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/Ejemplo1Controller.php',
        ]);
    }

    public function producto($num1, $num2): Response
    {
        $producto = $num1 * $num2;
        return new Response("<html><body>$producto</body></html>");
    }

    public function defecto1($num) {
        return new Response("<html><body>$num</body></html>");
    }

    public function cuadrado($num)
    {
        return $this->redirectToRoute('producto', array('num1' => $num, 'num2' => $num));
    }

    public function saludo($nombre)
    {
        return $this->render(('saludo.html.twig'),[
           'nombre' => $nombre
        ]);
    }

    public function condicional($numero)
    {
        return $this->render('condicional.html.twig', [
            'numero' => $numero
        ]);
    }

    public function tabla($numero)
    {
        return $this->render(('tabla.html.twig'), [
            'numero' => $numero
        ]);
    }
}
