<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ShopBundle\Entity\Products;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parent_id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $level;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;

    /**
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Product", inversedBy="categories")
     * @ORM\JoinTable(name="categories_products",
     *     joinColumns={
     *       @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *       @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     *     }
     * )
     */
    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();

    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    public function setParentId(?int $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        $this->level = $level;

        return $this;
    }
    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getProducts()
    {
        return $this->products;
    }

}



