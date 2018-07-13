<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Stmt\Catch_;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as AssertP;
use App\Entity\Category as Category;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Type("string",groups={"Default","Group1"})
     * @Assert\Length(max=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Type("integer")
     * @Assert\Length(max=10)
     * @Assert\NotNull()
     * @Assert\GreaterThanOrEqual(5,groups={"superieur5"})
     * @Assert\GreaterThanOrEqual(7,groups={"superieur5","superieur7"})
     *
     */
    private $price;

    /**
     * @ORM\Column(type="text", nullable=true)
    // * @AssertP\ContainsAlphanumeric()
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Type("boolean")
     * @Assert\NotNull()
     */
    private $available;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="products")
     * @Assert\Type("App\Entity\Category")
     * @Assert\NotNull()
     * @Assert\Valid()
     */
    private $category;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\Type("date")
     */
    private $date1;

    /**
     * @ORM\Column(type="date")
     * @Assert\Type("datetime")
     * @Assert\NotNull()
     */
    private $date2;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\Type("datetime")
     */
    private $datetime1;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\Type("datetime")
     * @Assert\NotNull()
     */
    private $datetime2;

    /**
     * @Assert\Choice(callback={"App\Enum\StatusType", "getValues"})
     */
    private $status;

    /**
     * @ORM\Column(type="decimal", precision=18, scale=12, nullable=true)
     * @Assert\Type("numeric")
     * @Assert\Range(max = 999999.999999995)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0, nullable=true)
     * @Assert\Type("numeric")
     * @Assert\Range(max = 9999999999.4)
     */
    private $size;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $zone;





    /**
     * @Assert\IsFalse(
     *     message="The name is equivalent to the description."
     * )
     */
    public function isNameEqualDescription() {
        return $this->name == $this->description;
    }

    /**
     * @Assert\IsFalse(
     *     message="The field is blank."
     * )
     */
    public function isBlank() {
        return $this->name == $this->description;
    }


    public function __construct()
    {
    //    $this->category = new Category();
    }


    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable($available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory($category = null): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDate1(): ?\DateTimeInterface
    {
        return $this->date1;
    }

    public function setDate1($date1): self
    {
        $this->date1 = $date1;

        return $this;
    }

    public function getDate2(): ?\DateTimeInterface
    {
        return $this->date2;
    }

    public function setDate2(\DateTime $date2): self
    {
        $this->date2 = $date2;

        return $this;
    }

    public function getDatetime1(): ?\DateTimeInterface
    {
        return $this->datetime1;
    }

    public function setDatetime1($datetime1): self
    {
        $this->datetime1 = $datetime1;

        return $this;
    }

    public function getDatetime2(): ?\DateTimeInterface
    {
        return $this->datetime2;
    }

    public function setDatetime2(\DateTime $datetime2): self
    {
        $this->datetime2 = $datetime2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(?string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

}
