<?php

namespace App\Entity;

use App\Repository\IncluyeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IncluyeRepository::class)]
class Incluye
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $pedido = null;

    #[ORM\Column]
    private ?int $producto = null;

    #[ORM\Column]
    private ?int $unidades = null;

    public function getid(): ?int
    {
        return $this->id;
    }

    public function getPedido(): ?int
    {
        return $this->pedido;
    }

    public function setPedido(int $pedido): static
    {
        $this->pedido = $pedido;

        return $this;
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

    public function getUnidades(): ?int
    {
        return $this->unidades;
    }

    public function setUnidades(int $unidades): static
    {
        $this->unidades = $unidades;

        return $this;
    }
}
