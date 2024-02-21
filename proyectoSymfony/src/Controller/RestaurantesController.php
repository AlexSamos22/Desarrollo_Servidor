<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\RestaurantesRepository;
use App\Entity\Restaurantes;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class RestaurantesController extends AbstractController
{
    //#[Route('/restaurantes', name: 'app_restaurantes')]
    public function index(): Response
    {
        return $this->render('restaurantes/index.html.twig', [
            'controller_name' => 'RestaurantesController',
        ]);
    }

    public function getRestaurantes(restaurantesRepository $restaurantesRepository) {
        $listRes = $restaurantesRepository -> findAll();
        return $this -> render(('restaurantes/restaurantes.html.twig'), [
            'restaurantes' => $listRes
        ]);
    }

    public function buscaRestaurante($id, restaurantesRepository $restaurantesRepository) {
        $listRes = $restaurantesRepository -> encontrarID($id);
        return $this -> render(('restaurantes/restaurantes.html.twig'), [
            'restaurantes' => $listRes
        ]);
    }

    public function buscaCorreo($correo, restaurantesRepository $restaurantesRepository) {
        $listRes = $restaurantesRepository -> encontrarCorreo($correo);
        return $this -> render(('restaurantes/restaurantes.html.twig'), [
            'restaurantes' => $listRes
        ]);
    }

    public function crearRestaurantes(Request $Request, ManagerRegistry $doctrine){
        $rest = new Restaurantes();

        $formRest = $this->createForm(\App\Form\RestaurantesType::class, $rest);
        $em = $doctrine->getManager();
        $formRest->handleRequest($Request);

        if ($formRest->isSubmitted() && $formRest->isValid()) {
            $rest->setRol(1);
            $em->persist($rest);
            $em->flush();

            return $this->redirectToRoute('restaurantes');
        }

        return $this->render('restaurantes/crearRestaurantes.html.twig', [
            'formRest' => $formRest->createView()
        ]);
    }

    public function eliminarRestaurantes($id, ManagerRegistry $doctrine, restaurantesRepository $restaurantesRepository){
        $id = $restaurantesRepository->find($id);
        $em = $doctrine->getManager();
        $id->setRol(0);
        $em->persist($id);
        $em->flush();

        return $this->redirectToRoute('restaurantes');
    }

    public function modificarRestaurantes($id, Request $Request, ManagerRegistry $doctrine,restaurantesRepository $restaurantesRepository){
        $em= $doctrine->getManager();
        $rest= $restaurantesRepository->find($id);
        $formRest= $this->createForm(\App\Form\RestaurantesType::class, $rest);

        $formRest->handleRequest($Request);
        if ($formRest->isSubmitted() && $formRest->isValid()){
                $em->persist($rest);
                $em->flush();
                return $this->redirectToRoute("restaurantes");
        }
        return $this->render('restaurantes/modificarRestaurantes.html.twig', [
            'formRest' => $formRest->createView()
            ]);   
    }


}
