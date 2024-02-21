<?php

namespace App\Entity;

use App\Repository\RestaurantesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantesRepository::class)]
class Restaurantes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Correo = null;

    #[ORM\Column(length: 255)]
    private ?string $Clave = null;

    #[ORM\Column(length: 255)]
    private ?string $Pais = null;

    #[ORM\Column]
    private ?int $CP = null;

    #[ORM\Column(length: 255)]
    private ?string $Ciudad = null;

    #[ORM\Column]
    private ?int $Rol = null;

    #[ORM\Column(length: 255)]
    private ?string $Direccion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(string $Correo): static
    {
        $this->Correo = $Correo;

        return $this;
    }

    public function getClave(): ?string
    {
        return $this->Clave;
    }

    public function setClave(string $Clave): static
    {
        $this->Clave = $Clave;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->Pais;
    }

    public function setPais(string $Pais): static
    {
        $this->Pais = $Pais;

        return $this;
    }

    public function getCP(): ?int
    {
        return $this->CP;
    }

    public function setCP(int $CP): static
    {
        $this->CP = $CP;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->Ciudad;
    }

    public function setCiudad(string $Ciudad): static
    {
        $this->Ciudad = $Ciudad;

        return $this;
    }

    public function getRol(): ?int
    {
        return $this->Rol;
    }

    public function setRol(int $Rol): static
    {
        $this->Rol = $Rol;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(string $Direccion): static
    {
        $this->Direccion = $Direccion;

        return $this;
    }

}
