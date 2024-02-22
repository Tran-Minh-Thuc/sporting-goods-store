<?php

namespace App\Entity;

use App\Repository\CartDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartDetailsRepository::class)]
class CartDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cartDetails')]
    private ?carts $Carts = null;

    #[ORM\ManyToOne(inversedBy: 'cartDetails')]
    private ?products $products = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $totalPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarts(): ?carts
    {
        return $this->Carts;
    }

    public function setCarts(?carts $Carts): static
    {
        $this->Carts = $Carts;

        return $this;
    }

    public function getProducts(): ?products
    {
        return $this->products;
    }

    public function setProducts(?products $products): static
    {
        $this->products = $products;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): static
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }
}
