<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $productName = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $productDiscription = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $productPrice = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categories $categoryType = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\ManyToOne(inversedBy: 'productId')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cart $cart = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    public function __toString(): string
    {
        return (string) $this->getProductName();
}


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): self
    {
        $this->productName = $productName;

        return $this;
    }

    public function getProductDiscription(): ?string
    {
        return $this->productDiscription;
    }

    public function setProductDiscription(string $productDiscription): self
    {
        $this->productDiscription = $productDiscription;

        return $this;
    }

    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    public function setProductPrice(string $productPrice): self
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getCategoryType(): ?Categories
    {
        return $this->categoryType;
    }

    public function setCategoryType(?Categories $categoryType): self
    {
        $this->categoryType = $categoryType;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }


    public function getCart(): ?Cart
    {
        return $this->cart;
    }

    public function setCart(?Cart $cart): self
    {
        $this->cart = $cart;

        return $this;
    }


    // todo: Wat doet dit?
    public function getPicture(): ?string
    {
        // todo: wat doet dit?
        if (!$this->picture) {
            return null;
        }
        // todo: wat doet dit?
        if (strpos($this->picturel, '/') !== false) {

            //todo: wat wordt hier gereturned.
            return $this->picture;
        }
        // todo: wat doet hij hier?
        return sprintf('/uploads/images/%s', $this->picture);

    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
