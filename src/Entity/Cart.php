<?php

namespace App\Entity;

use App\Repository\CartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartRepository::class)]
class Cart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'cart', targetEntity: Product::class)]
    private Collection $productId;

    #[ORM\OneToMany(mappedBy: 'cart', targetEntity: Order::class)]
    private Collection $orderId;

    #[ORM\Column]
    private ?int $count = null;

    public function __construct()
    {
        $this->productId = new ArrayCollection();
        $this->orderId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProductId(): Collection
    {
        return $this->productId;
    }

    public function addProductId(Product $productId): self
    {
        if (!$this->productId->contains($productId)) {
            $this->productId->add($productId);
            $productId->setCart($this);
        }

        return $this;
    }

    public function removeProductId(Product $productId): self
    {
        if ($this->productId->removeElement($productId)) {
            // set the owning side to null (unless already changed)
            if ($productId->getCart() === $this) {
                $productId->setCart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrderId(): Collection
    {
        return $this->orderId;
    }

    public function addOrderId(Order $orderId): self
    {
        if (!$this->orderId->contains($orderId)) {
            $this->orderId->add($orderId);
            $orderId->setCart($this);
        }

        return $this;
    }

    public function removeOrderId(Order $orderId): self
    {
        if ($this->orderId->removeElement($orderId)) {
            // set the owning side to null (unless already changed)
            if ($orderId->getCart() === $this) {
                $orderId->setCart(null);
            }
        }

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }
}
