<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
/**
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 */
class Person
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
    private $firstName;

    /**
     * @ORM\ManyToMany(targetEntity=Publication::class, inversedBy="people")
     */
    private $publications;

    /**
     * @ORM\ManyToMany(targetEntity=Article::class, inversedBy="people")
     */
    private $articles;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isOffice;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $role;

    // pour l'image d'illustration--------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File
     */
    private $photoName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="person_image", fileNameProperty="photoName")
     * @var File
     */
    private $photoFile;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->articles = new ArrayCollection();
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        $this->publications->removeElement($publication);

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        $this->articles->removeElement($article);

        return $this;
    }
    
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }

    public function getIsOffice(): ?bool
    {
        return $this->isOffice;
    }

    public function setIsOffice(bool $isOffice): self
    {
        $this->isOffice = $isOffice;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function setPhotoFile(?File $photoFile = null): void
    {
        $this->photoFile = $photoFile;

        // It is required that at least one field changes if you are using doctrine
        // otherwise the event listeners won't be called and the file is lost

        if (null !== $photoFile) {         // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datePubli = new \DateTimeImmutable();
        }

    }

    public function getPhotoFile(): ?File
    {
        return $this->photoFile;
    }
}
