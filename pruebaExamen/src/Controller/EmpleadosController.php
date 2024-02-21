<?php

namespace App\Controller;

use App\Entity\Empleado;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\EmpleadoRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class EmpleadosController extends AbstractController
{
    //#[Route('/empleados', name: 'app_empleados')]
    public function index(): Response
    {
        return $this->render('empleados/index.html.twig', [
            'controller_name' => 'EmpleadosController',
        ]);
    }

    public function getEmpleados(EmpleadoRepository $empleados){
        $lista = $empleados->findAll();
        return $this->render(('empleados/empleados.html.twig'),[
            'lista' => $lista
        ]);
    }

    public function getEmpleado($id, EmpleadoRepository $empleados){
        $lista = $empleados->encontrarID($id);
        return $this->render(('empleados/empleados.html.twig'),[
            'lista' => $lista
        ]);
    }

    public function setEmpleados(Request $Request  ,ManagerRegistry $doctrine){
       $empleado = new Empleado();

       $formEmpleado = $this->createForm(\App\Form\EmpleadosType::class, $empleado);
       $em = $doctrine->getManager();
       $formEmpleado->handleRequest($Request);

       if ($formEmpleado->isSubmitted() && $formEmpleado->isValid()) {
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('getEmpleados');
       }

       return $this->render('empleados/addEmpleados.html.twig',[
            'formEmple' => $formEmpleado->createView()
       ]);
    }

    public function modEmpleados($id, Request $Request  ,ManagerRegistry $doctrine, EmpleadoRepository $empleadoRepository){
        $em = $doctrine->getManager();
        $empleado = $empleadoRepository->find($id);
        $formEmpleado = $this->createForm(\App\Form\EmpleadosType::class, $empleado);

        $formEmpleado->handleRequest($Request);

       if ($formEmpleado->isSubmitted() && $formEmpleado->isValid()) {
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('getEmpleados');
       }

 
        return $this->render('empleados/modEmpleado.html.twig',[
             'formEmple' => $formEmpleado->createView()
        ]);
     }




}
