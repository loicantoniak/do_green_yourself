<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\GetIngredientIllustrationController;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 * @ORM\Table(name="Ingredient")
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     normalizationContext={"groups"={"read", "get"}},
 *     denormalizationContext={"groups"={"write"}},
 *     itemOperations={
 *         "get"={
                "method"="GET",
 *              "normalization_context"={"groups"={"get_tutorial"}}
 *     },
 *         "get_illustration"={
 *             "method"="GET",
 *             "path"="/ingredient/{id}/illustration",
 *             "controller"=GetIngredientIllustrationController::class,
 *             "formats"={"jpg"={"image/jpg"}},
 *             "openapi_context"={
 *                 "summary"="Retrieves the ingredient's illustration",
 *                 "responses" = {
 *                     "200"={"description"="The ingredient's illustration", "content"={"image/jpg"={"schema"={"type"="string","format"="binary"}}}},
 *                     "404"={"description"="resource not found"},
 *                 }
 *             }
 *          }
 *     },
 * )
 */
class Ingredient
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read", "write", "get_essential"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "get_tutorial"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20)
     * @Groups({"get_tutorial"})
     */
    private $unit;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"read", "get_essential", "write"})
     */
    private $essential;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $illustration;

    /**
     * @ORM\OneToMany(targetEntity="Need", mappedBy="ingredient", cascade={"remove"})
     *
     */
    private $needs;

    /**
     * @ORM\OneToMany(targetEntity="ShoppingList", mappedBy="ingredient", cascade={"remove"})
     * @Groups({"read"})
     */
    private $shoppingLists;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"read", "write"})
     */
    private $description;

    public function __construct()
    {
        $this->needs = new ArrayCollection();
        $this->shoppingLists = new ArrayCollection();
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

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getEssential(): ?bool
    {
        return $this->essential;
    }

    public function setEssential(bool $essential): self
    {
        $this->essential = $essential;

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
     * @return Collection|Need[]
     */
    public function getNeeds(): Collection
    {
        return $this->needs;
    }

    public function addNeed(Need $need): self
    {
        if (!$this->needs->contains($need)) {
            $this->needs[] = $need;
            $need->setIngredient($this);
        }

        return $this;
    }

    public function removeNeed(Need $need): self
    {
        if ($this->needs->contains($need)) {
            $this->needs->removeElement($need);
            // set the owning side to null (unless already changed)
            if ($need->getIngredient() === $this) {
                $need->setIngredient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ShoppingList[]
     */
    public function getShoppingLists(): Collection
    {
        return $this->shoppingLists;
    }

    public function addShoppingList(ShoppingList $shoppingList): self
    {
        if (!$this->shoppingLists->contains($shoppingList)) {
            $this->shoppingLists[] = $shoppingList;
            $shoppingList->setIngredient($this);
        }

        return $this;
    }

    public function removeShoppingList(ShoppingList $shoppingList): self
    {
        if ($this->shoppingLists->contains($shoppingList)) {
            $this->shoppingLists->removeElement($shoppingList);
            // set the owning side to null (unless already changed)
            if ($shoppingList->getIngredient() === $this) {
                $shoppingList->setIngredient(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
