<?php
// src/EquipoBidireccional.php
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="equipo")
 **/
class EquipoBidireccional
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    private $id;
    /** @ORM\Column(type="string") **/
    private $nombre;
	/** @ORM\Column(type="integer") **/
	private $fundacion;
	/** @ORM\Column(type="integer") **/
	private $socios;
	/** @ORM\Column(type="string") **/
    private $ciudad;
	
	/**
     * Un equipo tiene muchos jugadores
     * @ORM\OneToMany(targetEntity="JugadorBidireccional", mappedBy="equipo")
     */
	private $jugadores;
	
	public function __construct() {
        $this->jugadores = new ArrayCollection();
    }
	public function getJugadores()
    {
        return $this->jugadores;
    }
	public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
	public function getFundacion()
    {
        return $this->fundacion;
    }

    public function setFundacion($fundacion)
    {
        $this->fundacion = $fundacion;
    }
	public function getSocios()
    {
        return $this->socios;
    }
	
	public function setSocios($socios)
    {
        $this->socios = $socios;
    }
	public function getCiudad()
    {
        return $this->ciudad;
    }
	
	public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }  
	
}