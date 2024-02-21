<?php

namespace App\Entity;

use App\Repository\PedidosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedidosRepository::class)]
class Pedidos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fecharecibido = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $fechaenviado = null;


    #[ORM\Column]
    private ?int $cliente = null;

    public function getid(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecharecibido;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecharecibido = $fecha;

        return $this;
    }

    public function getFecha_enviado(): ?\DateTimeInterface
    {
        return $this->fechaenviado;
    }

    public function setFecha_enviado(\DateTimeInterface $fecha): static
    {
        $this->fechaenviado = $fecha;

        return $this;
    }

    public function getcliente(): ?int
    {
        return $this->cliente;
    }

    public function setcliente(int $cliente): static
    {
        $this->cliente = $cliente;

        return $this;
    }
}
