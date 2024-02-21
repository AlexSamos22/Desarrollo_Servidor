<?php

namespace App\Controller;

use App\Entity\Jugador;
use App\Repository\JugadorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JugadoresController extends AbstractController
{
    //#[Route('/jugadores', name: 'app_jugadores')]
    public function index(): Response
    {
        return $this->render('jugadores/index.html.twig', [
            'controller_name' => 'JugadoresController',
        ]);
    }

    public function getJugadores(JugadorRepository $jugadores){
        $lista = $jugadores->findAll();

        return $this->render(('jugadores/jugadores.html.twig'),[
            'lista' => $lista
        ]);
    }


    public function getJugador($id, JugadorRepository $jugadores){
        $lista = $jugadores->encontrarID($id);

        return $this->render(('jugadores/jugadores.html.twig'),[
            'lista' => $lista
        ]);
    }

    public function setJugadores(Request $Request, ManagerRegistry $doctrine){
        $jugador = new Jugador();

        $formJugadores = $this->createForm(\App\Form\JugadorType::class, $jugador);
        $em = $doctrine->getManager();
        $formJugadores->handleRequest($Request);

        if ($formJugadores->isSubmitted() && $formJugadores->isValid()) {
            $em->persist($jugador);
            $em->flush();

            return $this->redirectToRoute('getJugadores');
        }

        return $this->render(('jugadores/setJugadores.html.twig'),[
            'formJugadores' => $formJugadores->createView()
        ]);
    }

    public function modJugador($id, Request $request, ManagerRegistry $doctrine, JugadorRepository $jugadorRepository){
        $em = $doctrine->getManager();
        $jugador = $jugadorRepository->find($id);
        $formJugadores = $this->createForm(\App\Form\JugadorType::class, $jugador);
        $formJugadores->handleRequest($request);

        if ($formJugadores->isSubmitted() && $formJugadores->isValid()) {
            $em->persist($jugador);
            $em->flush();

            return $this->redirectToRoute('getJugadores');
        }

        return $this->render(('jugadores/modJugadores.html.twig'),[
            'formJugadores' => $formJugadores
        ]);
    }
}
