<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?productTypes $productTypes = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $decriptions = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\OneToMany(mappedBy: 'products', targetEntity: ProductSizes::class)]
    private Collection $productSizes;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?Carts $carts = null;

    public function __construct()
    {
        $this->productSizes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductTypes(): ?productTypes
    {
        return $this->productTypes;
    }

    public function setProductTypes(?productTypes $productTypes): static
    {
        $this->productTypes = $productTypes;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDecriptions(): ?string
    {
        return $this->decriptions;
    }

    public function setDecriptions(string $decriptions): static
    {
        $this->decriptions = $decriptions;

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

    /**
     * @return Collection<int, ProductSizes>
     */
    public function getProductSizes(): Collection
    {
        return $this->productSizes;
    }

    public function addProductSize(ProductSizes $productSize): static
    {
        if (!$this->productSizes->contains($productSize)) {
            $this->productSizes->add($productSize);
            $productSize->setProducts($this);
        }

        return $this;
    }

    public function removeProductSize(ProductSizes $productSize): static
    {
        if ($this->productSizes->removeElement($productSize)) {
            // set the owning side to null (unless already changed)
            if ($productSize->getProducts() === $this) {
                $productSize->setProducts(null);
            }
        }

        return $this;
    }

    public function getCarts(): ?Carts
    {
        return $this->carts;
    }

    public function setCarts(?Carts $carts): static
    {
        $this->carts = $carts;

        return $this;
    }
}
