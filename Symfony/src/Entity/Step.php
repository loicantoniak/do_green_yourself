<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StepRepository")
 * @ORM\Table(name="Step")
 * @ApiResource(attributes={"pagination_enabled"=false})
 *
 */
class Step
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"get_tutorial"})
     */
    private $number;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"get_tutorial"})
     */
    private $text;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $illustration;

    /**
     * @ORM\ManyToOne(targetEntity="Tutorial", inversedBy="steps")
     *
     */
    private $tutorial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

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

    public function getTutorial(): ?Tutorial
    {
        return $this->tutorial;
    }

    public function setTutorial(?Tutorial $tutorial): self
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    public function __toString()
    {
        return $this->text;
    }
}
