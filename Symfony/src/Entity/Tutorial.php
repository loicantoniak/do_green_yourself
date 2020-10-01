<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\GetTutorialIllustrationController;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TutorialRepository")
 * @ORM\Table(name="Tutorial")
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
 *             "path"="/tutorial/{id}/illustration",
 *             "controller"=GetTutorialIllustrationController::class,
 *             "formats"={"jpg"={"image/jpg"}},
 *             "openapi_context"={
 *                 "summary"="Retrieves the tutorial's illustration",
 *                 "responses" = {
 *                     "200"={"description"="The tutorial'sillustration", "content"={"image/jpg"={"schema"={"type"="string","format"="binary"}}}},
 *                     "404"={"description"="resource not found"},
 *                 }
 *             }
 *          }
 *     },
 * )
 * @ApiFilter(OrderFilter::class, properties={"date": "ASC"})
 */
class Tutorial
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read", "write", "get_tutorial", "tag"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write", "get_tutorial" })
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"read", "write", "get_tutorial"})
     */
    private $description;

    /**
     * @ORM\Column(type="time", nullable=true)
     * @Groups({"get_tutorial"})
     */
    private $preparationTime;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $averageGrade;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $illustration;

    /**
     * @ORM\Column(type="string", length=22, nullable=false, columnDefinition="ENUM('Being edited', 'Waiting for validation', 'Online', 'Offline')")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read", "get_tutorial"})
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tutorialsPosted")
     * @Groups({"get_tutorial"})
     */
    private $postUser;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="tutorialsBookmarked")
     */
    private $bookmarkUsers;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="tutorial", cascade={"remove"})
     * @Groups({"get_tutorial"})
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="Step", mappedBy="tutorial", cascade={"remove"})
     * @Groups({"get_tutorial"})
     */
    private $steps;

    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="tutorials")
     * @ORM\JoinTable(name="tutorial_category", joinColumns=@ORM\JoinColumn(name="tutorial_id"), inverseJoinColumns=@ORM\JoinColumn(name="category_id"))
     * @Groups({"get_tutorial"})
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="tutorials")
     * @Groups({"get_tutorial"})
     */
    private $tags;

    /**
     * @ORM\OneToMany(targetEntity="Need", mappedBy="tutorial", cascade={"remove"})
     * @Groups({"get_tutorial"})
     */
    private $needs;

    /**
     * @ORM\OneToMany(targetEntity="Grade", mappedBy="tutorial", cascade={"remove"})
     */
    private $grades;

    public function __construct()
    {
        $this->setStatus('Being edited');
        $this->setDate(new \DateTime('now'));
        $this->bookmarkUsers = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->steps = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->needs = new ArrayCollection();
        $this->grades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPreparationTime(): ?\DateTimeInterface
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(?\DateTimeInterface $preparationTime): self
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    public function getAverageGrade(): ?float
    {
        return $this->averageGrade;
    }

    public function setAverageGrade(?float $averageGrade): self
    {
        $this->averageGrade = $averageGrade;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPostUser(): ?User
    {
        return $this->postUser;
    }

    public function setPostUser(?User $postUser): self
    {
        $this->postUser = $postUser;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getBookmarkUsers(): Collection
    {
        return $this->bookmarkUsers;
    }

    public function addBookmarkUser(User $bookmarkUser): self
    {
        if (!$this->bookmarkUsers->contains($bookmarkUser)) {
            $this->bookmarkUsers[] = $bookmarkUser;
        }

        return $this;
    }

    public function removeBookmarkUser(User $bookmarkUser): self
    {
        if ($this->bookmarkUsers->contains($bookmarkUser)) {
            $this->bookmarkUsers->removeElement($bookmarkUser);
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setTutorial($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getTutorial() === $this) {
                $comment->setTutorial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Step[]
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(Step $step): self
    {
        if (!$this->steps->contains($step)) {
            $this->steps[] = $step;
            $step->setTutorial($this);
        }

        return $this;
    }

    public function removeStep(Step $step): self
    {
        if ($this->steps->contains($step)) {
            $this->steps->removeElement($step);
            // set the owning side to null (unless already changed)
            if ($step->getTutorial() === $this) {
                $step->setTutorial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
        }

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }

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
            $need->setTutorial($this);
        }

        return $this;
    }

    public function removeNeed(Need $need): self
    {
        if ($this->needs->contains($need)) {
            $this->needs->removeElement($need);
            // set the owning side to null (unless already changed)
            if ($need->getTutorial() === $this) {
                $need->setTutorial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Grade[]
     */
    public function getGrades(): Collection
    {
        return $this->grades;
    }

    public function addGrade(Grade $grade): self
    {
        if (!$this->grades->contains($grade)) {
            $this->grades[] = $grade;
            $grade->setTutorial($this);
        }

        return $this;
    }

    public function removeGrade(Grade $grade): self
    {
        if ($this->grades->contains($grade)) {
            $this->grades->removeElement($grade);
            // set the owning side to null (unless already changed)
            if ($grade->getTutorial() === $this) {
                $grade->setTutorial(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
