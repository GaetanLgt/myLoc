<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @Vich\Uploadable
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
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalPts;

    /**
     * @ORM\OneToMany(targetEntity=Emprunt::class, mappedBy="Emprunteur")
     */
    private $emprunts;

    /**
     * @ORM\OneToMany(targetEntity=Affaires::class, mappedBy="proprietaire")
     */
    private $affaires;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function __construct()
    {
        $this->emprunts = new ArrayCollection();
        $this->affaires = new ArrayCollection();
        $this->updatedAt = new \datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTotalPts(): ?int
    {
        return $this->totalPts;
    }

    public function setTotalPts(?int $totalPts): self
    {
        $this->totalPts = $totalPts;

        return $this;
    }
     /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="userImg", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;


    /**
     * @return Collection|Emprunt[]
     */
    public function getEmprunts(): Collection
    {
        return $this->emprunts;
    }

    public function addEmprunt(Emprunt $emprunt): self
    {
        if (!$this->emprunts->contains($emprunt)) {
            $this->emprunts[] = $emprunt;
            $emprunt->setEmprunteur($this);
        }

        return $this;
    }

    public function removeEmprunt(Emprunt $emprunt): self
    {
        if ($this->emprunts->contains($emprunt)) {
            $this->emprunts->removeElement($emprunt);
            // set the owning side to null (unless already changed)
            if ($emprunt->getEmprunteur() === $this) {
                $emprunt->setEmprunteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Affaires[]
     */
    public function getAffaires(): Collection
    {
        return $this->affaires;
    }

    public function addAffaire(Affaires $affaire): self
    {
        if (!$this->affaires->contains($affaire)) {
            $this->affaires[] = $affaire;
            $affaire->setProprietaire($this);
        }

        return $this;
    }

    public function removeAffaire(Affaires $affaire): self
    {
        if ($this->affaires->contains($affaire)) {
            $this->affaires->removeElement($affaire);
            // set the owning side to null (unless already changed)
            if ($affaire->getProprietaire() === $this) {
                $affaire->setProprietaire(null);
            }
        }

        return $this;
    }

    public function getUsername()
    {
        return $this->firstname;
    }

    public function getSalt()
    {

    }

    public function eraseCredentials()
    {

    }

    public function getRoles()
    {
        $role = $this->role;
        return preg_split("/[,]+/",$role);
    }

    public function __toString()
    {
        return $this->lastname.' '.$this->firstname;
    }

    public function getRole()
    {
        $role = array($this->role);
        return $role;
    }

    public function setRole($role)
    {
        $this->role = "ROLE_USER";
        if( $role == ["ROLE_ADMIN"] ){
            $this->role = "ROLE_ADMIN";
        } else if( $role == ["ROLE_USER"] ){
            $this->role = "ROLE_USER";
        }
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }
 
}

