<?php

namespace App\Entity;

use App\Repository\SaleProductsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaleProductsRepository::class)]
class SaleProducts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?products $products = null;

    #[ORM\Column]
    private ?float $percentDiscount = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $discountTerm = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPercentDiscount(): ?float
    {
        return $this->percentDiscount;
    }

    public function setPercentDiscount(float $percentDiscount): static
    {
        $this->percentDiscount = $percentDiscount;

        return $this;
    }

    public function getDiscountTerm(): ?\DateTimeImmutable
    {
        return $this->discountTerm;
    }

    public function setDiscountTerm(\DateTimeImmutable $discountTerm): static
    {
        $this->discountTerm = $discountTerm;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }
}
