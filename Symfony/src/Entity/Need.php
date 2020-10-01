<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NeedRepository")
 * @ORM\Table(name="Need")
 * @ApiResource(attributes={"pagination_enabled"=false})
 */
class Need
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Groups({"get_tutorial"})
     */
    private $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Tutorial", inversedBy="needs")
     */
    private $tutorial;

    /**
     * @ORM\ManyToOne(targetEntity="Ingredient", inversedBy="needs")
     * @Groups({"get_tutorial"})
     */
    private $ingredient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTutorial(): ?Tutorial
    {
        return $this->tutorial;
    }

    public function setTutorial(?Tutorial $tutorial): self
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    public function getIngredient(): ?Ingredient
    {
        return $this->ingredient;
    }

    public function setIngredient(?Ingredient $ingredient): self
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function __toString()
    {
        return $this->amount;
    }
}
