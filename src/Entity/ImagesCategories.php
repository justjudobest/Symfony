<?php

namespace App\Entity;

use App\Repository\ImagesCategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesCategoriesRepository::class)
 */
class ImagesCategories
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
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="integer")
     */
    private $categories_id;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="imagesCategories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_id", referencedColumnName="id")
     * })
     */
    private $images;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCategoriesId(): ?int
    {
        return $this->categories_id;
    }

    public function setCategoriesId(int $categories_id): self
    {
        $this->categories_id = $categories_id;

        return $this;
    }

    public function getImagesCategories()
    {
        return $this->images;
    }
}
