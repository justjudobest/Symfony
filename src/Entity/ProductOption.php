<?php

namespace App\Entity;

use App\Repository\ProductOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductOptionRepository::class)
 */
class ProductOption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $parent_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_id;

    /**
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", inversedBy="productOption")
     * @ORM\JoinTable(name="productOption_products",
     *     joinColumns={
     *       @ORM\JoinColumn(name="productOption_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *       @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *     }
     * )
     */
    protected $products;

    /**
     * Products constructor.
     */





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function setParentId(int $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->product_id;
    }

    public function setProductId(int $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }



    public function getProducts()
    {
        return $this->products;
    }
}
