<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\ExistsFilter;
use App\Controller\GetCategoryIllustrationController;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @ORM\Table(name="Category")
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}},
 *     itemOperations={
 *         "get",
 *         "get_illustration"={
 *             "method"="GET",
 *             "path"="/category/{id}/illustration",
 *             "controller"=GetCategoryIllustrationController::class,
 *             "formats"={"jpg"={"image/jpg"}},
 *             "openapi_context"={
 *                 "summary"="Retrieves the category's illustration",
 *                 "responses" = {
 *                     "200"={"description"="The category'sillustration", "content"={"image/jpg"={"schema"={"type"="string","format"="binary"}}}},
 *                     "404"={"description"="resource not found"},
 *                 }
 *             }
 *          }
 *     },
 * )
 * @ApiFilter(ExistsFilter::class, properties={"parentCategory"})
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read", "write", "get_tutorial"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write", "get_tutorial"})
     */
    private $name;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $illustration;

    /**
     * @ORM\ManyToMany(targetEntity="Tutorial", mappedBy="categories")
     * @ORM\JoinTable(name="tutorial_category", joinColumns=@ORM\JoinColumn(name="category_id"), inverseJoinColumns=@ORM\JoinColumn(name="tutorial_id"))
     * @Groups({"read"})
     */
    private $tutorials;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="subCategories")
     * @Groups({"read", "write"})
     */
    private $parentCategory;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentCategory", cascade={"remove"})
     * @Groups({"read"})
     */
    private $subCategories;

    public function __construct()
    {
        $this->tutorials = new ArrayCollection();
        $this->subCategories = new ArrayCollection();
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

    public function getIllustration()
    {
        return $this->illustration;
    }

    public function setIllustration($illustration): self
    {
        $this->illustration = $illustration;

        return $this;
    }

    /**
     * @return Collection|Tutorial[]
     */
    public function getTutorials(): Collection
    {
        return $this->tutorials;
    }

    public function addTutorial(Tutorial $tutorial): self
    {
        if (!$this->tutorials->contains($tutorial)) {
            $this->tutorials[] = $tutorial;
            $tutorial->addCategories($this);
        }

        return $this;
    }

    public function removeTutorial(Tutorial $tutorial): self
    {
        if ($this->tutorials->contains($tutorial)) {
            $this->tutorials->removeElement($tutorial);
            $tutorial->removeCategories($this);
        }

        return $this;
    }

    public function getParentCategory(): ?self
    {
        return $this->parentCategory;
    }

    public function setParentCategory(?self $parentCategory): self
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(self $subCategory): self
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories[] = $subCategory;
            $subCategory->setParentCategory($this);
        }

        return $this;
    }

    public function removeSubCategory(self $subCategory): self
    {
        if ($this->subCategories->contains($subCategory)) {
            $this->subCategories->removeElement($subCategory);
            // set the owning side to null (unless already changed)
            if ($subCategory->getParentCategory() === $this) {
                $subCategory->setParentCategory(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
