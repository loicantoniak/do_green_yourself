<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\GetUserIllustrationController;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\GetUserController;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @ORM\Table(name="User")
 * @ApiResource(
 *     attributes={"pagination_enabled"=false},
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}},
 *     collectionOperations={
 *              "post",
 *             "get"={
 *                  "security"="is_granted('ROLE_USER')",
 *   }
 * },
 *     itemOperations={
 *         "get"={
 *             "method"="GET",
 *             "path"="/user",
 *             "read"=false,
 *             "controller"=GetUserController::class,
 *             "security"="is_granted('ROLE_USER')",
 *             "openapi_context"={
 *                 "summary"="Retrieves the logged in user",
 *                 "parameters"={},
 *                 "responses" = {
 *                     "200"={"description"="The logged in user"},
 *                     "404"={"description"="resource not found"},
 *                 }
 *             },
 *         },
 *         "get_illustration"={
 *             "method"="GET",
 *             "path"="/user/{id}/photo",
 *             "controller"=GetUserIllustrationController::class,
 *             "security"="is_granted('ROLE_USER')",
 *             "formats"={"jpg"={"image/jpg"}},
 *             "openapi_context"={
 *                 "summary"="Retrieves the user's illsutration",
 *                 "responses" = {
 *                     "200"={"description"="The user's illustration", "content"={"image/jpg"={"schema"={"type"="string","format"="binary"}}}},
 *                     "404"={"description"="resource not found"},
 *                 }
 *             }
 *          }
 *     },
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write", "get_tutorial"})
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write", "get_tutorial"})
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read", "write"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     * @Groups({"read", "write"})
     */
    private $postalCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read", "write"})
     */
    private $city;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read", "write"})
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read", "write"})
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=1, nullable=true, columnDefinition="ENUM('M', 'F', 'O')")
     * @Groups({"read", "write"})
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"read", "write"})
     */
    private $email;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reporting;

    /**
     * @ORM\ManyToMany(targetEntity="Shop", mappedBy="users")
     */
    private $shops;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user", cascade={"remove"})
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="Tutorial", mappedBy="postUser", orphanRemoval=true)
     */
    private $tutorialsPosted;

    /**
     * @ORM\ManyToMany(targetEntity="Tutorial", mappedBy="bookmarkUsers", cascade={"remove"})
     */
    private $tutorialsBookmarked;

    /**
     * @ORM\OneToMany(targetEntity="Grade", mappedBy="user", cascade={"remove"})
     */
    private $grades;

    /**
     * @ORM\OneToMany(targetEntity="ShoppingList", mappedBy="user", cascade={"remove"})
     */
    private $shoppingLists;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"read", "write"})
     */
    private $password;

    /**
     * @var string
     * @Assert\EqualTo(propertyPath="password", message="it's not same password !")
     */
    private $confirmPassword;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read", "write"})
     */
    private $pseudo;

    /**
     * @var string
     */
    private $salt;

    public function __construct()
    {
        $this->shops = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->tutorialsPosted = new ArrayCollection();
        $this->tutorialsBookmarked = new ArrayCollection();
        $this->grades = new ArrayCollection();
        $this->shoppingLists = new ArrayCollection();
        $this->salt = md5(uniqid(null, true));
        $this->setRoles(['ROLE_USER']);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getReporting()
    {
        return $this->reporting;
    }

    /**
     * @param mixed $reporting
     */
    public function setReporting($reporting): void
    {
        $this->reporting = $reporting;
    }

    public function getShops(): ArrayCollection
    {
        return $this->shops;
    }

    public function setShops(ArrayCollection $shops): void
    {
        $this->shops = $shops;
    }

    public function getComments(): ArrayCollection
    {
        return $this->comments;
    }

    public function setComments(ArrayCollection $comments): void
    {
        $this->comments = $comments;
    }

    public function getTutorialsPosted(): ArrayCollection
    {
        return $this->tutorialsPosted;
    }

    public function setTutorialsPosted(ArrayCollection $tutorialsPosted): void
    {
        $this->tutorialsPosted = $tutorialsPosted;
    }

    public function getTutorialsBookmarked(): ArrayCollection
    {
        return $this->tutorialsBookmarked;
    }

    public function setTutorialsBookmarked(ArrayCollection $tutorialsBookmarked): void
    {
        $this->tutorialsBookmarked = $tutorialsBookmarked;
    }

    public function getGrades(): ArrayCollection
    {
        return $this->grades;
    }

    public function setGrades(ArrayCollection $grades): void
    {
        $this->grades = $grades;
    }

    public function getShoppingLists(): ArrayCollection
    {
        return $this->shoppingLists;
    }

    public function setShoppingLists(ArrayCollection $shoppingLists): void
    {
        $this->shoppingLists = $shoppingLists;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @return User
     *
     * @see UserInterface
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getConfirmPassword(): string
    {
        return (string) $this->confirmPassword;
    }

    public function setConfirmPassword(string $confirmPassword): self
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * {@inheritdoc}
     */
    public function equals(UserInterface $user)
    {
        return $this->id === $user->getId();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize([
            $this->id,
        ]);
    }

    /**
     * @param $serialized
     *
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list(
            $this->id) = unserialize($serialized);
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function __toString()
    {
        return $this->name.' '.$this->firstname;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }
}
