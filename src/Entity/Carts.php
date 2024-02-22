<?php

namespace App\Entity;

use App\Repository\CartsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartsRepository::class)]
class Carts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?users $users = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column]
    private ?float $totalPrice = null;

    #[ORM\OneToMany(mappedBy: 'Carts', targetEntity: CartDetails::class)]
    private Collection $cartDetails;

    public function __construct()
    {
        $this->cartDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsers(): ?users
    {
        return $this->users;
    }

    public function setUsers(?users $users): static
    {
        $this->users = $users;

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

    /**
     * @return Collection<int, CartDetails>
     */
    public function getCartDetails(): Collection
    {
        return $this->cartDetails;
    }

    public function addCartDetail(CartDetails $cartDetail): static
    {
        if (!$this->cartDetails->contains($cartDetail)) {
            $this->cartDetails->add($cartDetail);
            $cartDetail->setCarts($this);
        }

        return $this;
    }

    public function removeCartDetail(CartDetails $cartDetail): static
    {
        if ($this->cartDetails->removeElement($cartDetail)) {
            // set the owning side to null (unless already changed)
            if ($cartDetail->getCarts() === $this) {
                $cartDetail->setCarts(null);
            }
        }

        return $this;
    }
}
