<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Categorias;
use App\Repository\CategoriasRepository;
use App\Entity\Productos;
use App\Repository\ProductosRepository;
use App\Entity\Pedidos;
use App\Entity\PedidosProductos;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Security\AppAuthAuthenticator;

class PBController extends AbstractController
{
    #[Route('/p/b', name: 'app_p_b')]
    public function index(): Response
    {
        return $this->render('pb/index.html.twig', [
            'controller_name' => 'PBController',
        ]);
    }
    #[Route('/categorias', name: 'categorias')]
    public function mostrarCategorias(CategoriasRepository $CategoriasRepository) {

        $categorias= $CategoriasRepository ->findAll();
        return $this->render (('categorias.html.twig'),[
            'categorias' => $categorias
        ]); 
  
    }
    #[Route('/productos/{id}', name: 'productos')]
    public function mostrarProductos($id, ProductosRepository $ProductosRepository) {
        $productos = $ProductosRepository->findById($id);

       
        //$productos = $ProductosRepository->findAll();
        if (!$productos) {
            throw $this->createNotFoundException('Categoría no encontrada');
        }
        return $this->render (('productos.html.twig'),[
            'productos' => $productos
        ]); 
    }    
    #[Route('/anadir', name: 'anadir')]
    public function anadir(SessionInterface $session) {
        $id = $_POST['id'];		
		$unidades= $_POST['unidades'];		
        $carrito = $session->get('carrito');
        if(is_null($carrito)){
            $carrito = array();
        }
        /*si existe el código sumamos las unidades, con mínimo de 0*/

        if(isset($carrito[$id])){
            $carrito[$id]['unidades'] += intval($unidades);            
        }else{
            $carrito[$id]['unidades'] = intval($unidades);
        }
        $session->set('carrito', $carrito);
        return $this->redirectToRoute('carrito');
    }
    #[Route('/eliminar', name: 'eliminar')]
    public function eliminar(SessionInterface $session){
        $id = $_POST['cod'];		
		$unidades= $_POST['unidades'];		
        $carrito = $session->get('carrito');
        if(is_null($carrito)){
            $carrito = array();
        }
        /*si existe el código sumamos las unidades, con mínimo de 0*/
        if(isset($carrito[$id])){
            $carrito[$id]['unidades'] -= intval($unidades);   
			if($carrito[$id]['unidades'] <= 0) {
				unset($carrito[$id]);
			}
        
        }
        $session->set('carrito', $carrito);
        return $this->redirectToRoute('carrito');
    }
    #[Route('/carrito', name: 'carrito')]
    public function mostrarCarrito(SessionInterface $session, ManagerRegistry $doctrine, ProductosRepository $ProductosRepository){
        /* `para cada elemento del carrito se consulta la base de datos y se recuepran sus datos*/
        $productos = [];
        $carrito = $session->get('carrito');
        /* si el carrito no existe se crea como un array vacío*/
        if(is_null($carrito)){
            $carrito = array();
            $session->set('carrito', $carrito);
        }
		/* se crea array con todos los datos de los productos y  la cantidad*/
        foreach ($carrito as $codigo => $cantidad){
            $producto = $ProductosRepository->find((int)$codigo);
            $elem = [];
            $elem['codProd'] = $producto->getId();
            $elem['nombre'] = $producto->getNombre();
            $elem['peso'] = $producto->getPeso();
            $elem['stock'] = $producto->getStock();
            $elem['descripcion'] = $producto->getDescripcion();
            $elem['unidades'] = implode($cantidad);
            $productos[] = $elem;
        }
        return $this->render("carrito.html.twig", array('productos'=>$productos));
    }
    #[Route('/realizarPedido', name: 'realizarPedido')]
	public function realizarPedido(SessionInterface $session, ManagerRegistry $doctrine, ProductosRepository $ProductosRepository) {
        $entityManager = $doctrine->getManager();
        $carrito = $session->get('carrito');
        /* si el carrito no existe, o está vacío*/
        if(is_null($carrito) ||count($carrito)==0){
            return $this->render("pedido.html.twig", array('error'=>1));
        }else{
            #crear un nuevo pedido
            $pedido = new Pedidos();
            $pedido->setFecha(new \DateTime());
            $pedido->setEnviado(0);
            $usuario=  $session->get('id');
            ///////////////Aqui deberiamos acceder al id del usuario
            $pedido->setRestaurante((int)$usuario);
            $entityManager->persist($pedido);
            #recorrer carrito creando nuevos pedidoproducto
            foreach ($carrito as $codigo => $cantidad){
                $producto =  $ProductosRepository->find((int)$codigo);
                $fila = new PedidosProductos();

                $fila->setProducto($producto->getId());
                $fila->setUnidades( implode($cantidad));

                ///////////
                $fila->setPedido((int)$pedido->getId());
                //actualizar el stock
                $cantidad = implode($cantidad);
                $query = $entityManager->createQuery("UPDATE App\Entity\Productos p SET p.stock = p.stock - $cantidad WHERE p.id = $codigo");
                $resul = $query->getResult();
                $entityManager->persist($fila);
            }
        }
        try {
            $entityManager->flush();
        }catch (Exception $e) {
            return $this->render("pedido.html.twig", array('error'=>2));
        }
        /*prepara el array de productos para la plantilla*/
        foreach ($carrito as $codigo => $cantidad){
            $producto =  $ProductosRepository->find((int)$codigo);
            $elem = [];
            $elem['id'] = $producto->getId();
            $elem['nombre'] = $producto->getNombre();
            $elem['peso'] = $producto->getPeso();
            $elem['stock'] = $producto->getStock();
            $elem['descripcion'] = $producto->getDescripcion();
            $elem['unidades'] = implode($cantidad);
            $productos[] = $elem;
        }
        //vaciar el carrito
        $session->set('carrito', array());
        /* mandar el correo */
	
        
        return $this->render("pedido.html.twig", array('error'=>0, 'id'=>$pedido->getId(), 'productos'=> $productos));
    }


}
