<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/mostrarUsers', name: 'mostrarUsers')]
    public function getRestaurantes(UserRepository $UserRepository){

        $listUsr= $UserRepository ->findAll();
        return $this->render (('User.html.twig'),[
            'listUsr' => $listUsr
        ]); 
    }

    #[Route('/Registro', name: 'Registro')]
    public function createUser(Request $Request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher){
        //si no incluimos la libreria se podría invocar como  $rest = new App/Restaurante();
        $user = new User();
        //Al no incluir la libreria se incluye así
        //En el objeto de tipo restaurantes está la informacion que recuoeramos del formulario y 

        $formUsr= $this->createForm(\App\Form\UserType::class, $user);
        $em= $doctrine->getManager();
        $formUsr->handleRequest($Request);
        ///Esto lo hacemos para validar el formulario
        if ($formUsr->isSubmitted() && $formUsr->isValid()){
            //si está validado necestamos acceder a la base de datos y añadir los datos del formulario
            $plaintextPassword = $user->getPassword();
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);
    
            $user->setRoles(['ROLE_USER']);
            $em->persist($user);
            $em->flush();

            //cuando estén incluidos hay que redirigir a otra pagina, en este caso lo voy a hacer al listado pra verificar que se ha hehco bien

            return $this->redirectToRoute('mostrarUsers');
        }

        //necesitamos enviar la variable que es el twig y recibirlo, que es la 2 parte
        return $this->render('CreaUser.html.twig', [
            'formUsr' => $formUsr->createView()
        ]);
    }

}
