<?php

namespace App\Entity;

use App\Repository\ReabasteceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReabasteceRepository::class)]
class Reabastece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?int $producto = null;

    #[ORM\Column(length: 255)]
    private ?int $administrador = null;

    #[ORM\Column(length: 255)]
    private ?int $unidades = null;

    public function getid(): ?int
    {
        return $this->id;
    }

    public function getProducto(): ?int
    {
        return $this->producto;
    }

    public function setProducto(int $producto): static
    {
        $this->producto = $producto;

        return $this;
    }

    public function getAdministrador(): ?int
    {
        return $this->administrador;
    }

    public function setAdministrador(int $admin): static
    {
        $this->administrador = $admin;

        return $this;
    }

    public function getUnidades(): ?int
    {
        return $this->unidades;
    }

    public function setPais(int $unidades): static
    {
        $this->unidades = $unidades;

        return $this;
    }

}
