<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Please provide a title")
     * @Assert\Length(min=5, max=255)
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotBlank(message="Please provide a price")
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @Assert\NotBlank(message="Please provide a description")
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @Assert\NotBlank(message="Please provide a area")
     * @ORM\Column(type="integer")
     */
    private $area;

    /**
     * @Assert\NotBlank(message="Please provide the number of rooms")
     * @Assert\Range(min="0", max="14", notInRangeMessage="Please provide a value in the range")
     * @ORM\Column(type="integer")
     */
    private $totalRooms;

    /**
     * @Assert\NotBlank(message="Please provide the number of bedrooms")
     * @Assert\Range(min="0", max="9", notInRangeMessage="Please provide a value in the range")
     * @ORM\Column(type="integer")
     */
    private $totalBedrooms;

    /**
     * @Assert\NotBlank(message="Please provide the number of bathrooms")
     * @Assert\Range(min="0", max="9", notInRangeMessage="Please provide a value in the range")
     * @ORM\Column(type="integer")
     */
    private $totalBathrooms;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, inversedBy="property", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $address;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="properties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @ORM\OneToMany(targetEntity=File::class, mappedBy="property")
     */
    private $files;

    /**
     * @Assert\NotBlank(message="Please provide the type")
     * @Assert\Choice(choices={"Villa", "House", "Penthouse", "Apartment", "Condo", "New Developments", "Chalets", "Commercial space"})
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @Assert\NotBlank(message="Please provide the type of the advert")
     * @Assert\Choice(choices={"Purchase", "Daily Rental", "Monthly Rental"})
     * @ORM\Column(type="string", length=255)
     */
    private $advertType;

    /**
     * @Assert\NotBlank(message="Please provide the website link")
     * @Assert\Length(min=8, max=255)
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkWebsite;

    /**
     * @Assert\NotBlank(message="Please provide the phone number")
     * @Assert\Length(min=5, max=14)
     * @ORM\Column(type="integer")
     */
    private $phoneContact;

    /**
     * @Assert\NotBlank(message="Please provide the name")
     * @Assert\Length(min=2, max=255)
     * @ORM\Column(type="string", length=255)
     */
    private $nameContact;

    /**
     * @ORM\ManyToMany(targetEntity=Feature::class, mappedBy="property", cascade={"persist"})
     */
    private $features;



    public function __construct()
    {
        $this->features = new ArrayCollection();
        $this->files = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

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

    public function getArea(): ?int
    {
        return $this->area;
    }

    public function setArea(int $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getTotalRooms(): ?int
    {
        return $this->totalRooms;
    }

    public function setTotalRooms(int $totalRooms): self
    {
        $this->totalRooms = $totalRooms;

        return $this;
    }

    public function getTotalBedrooms(): ?int
    {
        return $this->totalBedrooms;
    }

    public function setTotalBedrooms(int $totalBedrooms): self
    {
        $this->totalBedrooms = $totalBedrooms;

        return $this;
    }

    public function getTotalBathrooms(): ?int
    {
        return $this->totalBathrooms;
    }

    public function setTotalBathrooms(int $totalBathrooms): self
    {
        $this->totalBathrooms = $totalBathrooms;

        return $this;
    }


    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }



    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setProperty($this);
        }

        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getProperty() === $this) {
                $file->setProperty(null);
            }
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getAdvertType(): ?string
    {
        return $this->advertType;
    }

    public function setAdvertType(string $advertType): self
    {
        $this->advertType = $advertType;

        return $this;
    }

    public function getLinkWebsite(): ?string
    {
        return $this->linkWebsite;
    }

    public function setLinkWebsite(?string $linkWebsite): self
    {
        $this->linkWebsite = $linkWebsite;

        return $this;
    }

    public function getPhoneContact(): ?int
    {
        return $this->phoneContact;
    }

    public function setPhoneContact(int $phoneContact): self
    {
        $this->phoneContact = $phoneContact;

        return $this;
    }

    public function getNameContact(): ?string
    {
        return $this->nameContact;
    }

    public function setNameContact(string $nameContact): self
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    /**
     * @return Collection|Feature[]
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): self
    {
        if (!$this->features->contains($feature)) {
            $this->features[] = $feature;
            $feature->addProperty($this);
        }

        return $this;
    }

    public function removeFeature(Feature $feature): self
    {
        if ($this->features->removeElement($feature)) {
            $feature->removeProperty($this);
        }

        return $this;
    }


}
