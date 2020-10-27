<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $sku;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enable;
    /**
     * @var
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="images")
     */
    private $imagesProduct;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="App\Entity\AttributeProduct", mappedBy="products")
     */
    private $attributeProduct;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visibility;

    /**
     * @var
     *   * @ORM\OneToMany(targetEntity="App\Entity\ProductOption", mappedBy="products")
     */
    protected $productOption;

    /**
     * @var
     *   * @ORM\ManyToMany(targetEntity="App\Entity\Categories", mappedBy="products")
     */
    protected $categories;


    /**
     * Products constructor.
     */
    public function __construct()
    {
        $this->attributeProduct = new ArrayCollection();
        $this->imagesProduct = new ArrayCollection();
        $this->productOption = new ArrayCollection();
        $this->categories = new  ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }


    public function setSku(string $sku): self
    {
        $this->sku = $sku;

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

    public function getType(): ?string
    {
        return $this->type;
    }


    public function setType(string $type): self
    {
        $this->sku = $type;

        return $this;
    }

    public function getVisibility(): ?string
    {
        return $this->visibility;
    }


    public function setVisibility(string $Visibility): self
    {
        $this->sku = $Visibility;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributeProduct()
    {
        return $this->attributeProduct;
    }

    public function  getImagesProduct()
    {
        return $this->imagesProduct;
    }

    public function getProductOption()
    {
        return $this->productOption;
    }
    public function getCategories()
    {
        return $this->categories;
    }


}
