<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @Vich\Uploadable
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="date")
     */
    private $datePubli;

    //pour le pdf de la publication -------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * NOTE: expression qui verifie si la fin du tring contiens ".pdf" (verification pour eviter d'upload des fichiers non voulus),
     * @Assert\Regex("
     *     pattern=/[^\s]+(?=\.(pdf))\./D",
     *     message="Le fichier choisi dois etre au format PDF"
     * ) //TODO faire verifier le message d'erreur
     * @var File
     */
    private $pdfName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="article_pdf", fileNameProperty="pdfName")
     * @var File
     */
    private $pdfFile;

    // pour l'image d'illustration--------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="article_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\ManyToMany(targetEntity=Person::class, mappedBy="articles")
     */
    private $people;

    /**
     * @ORM\ManyToOne(targetEntity=Revue::class, inversedBy="articles")
     */
    private $revue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/^[a-z0-9\-]+$/",
     *     message="Le slug ne peut contenir que des lettres , nombres ou tirets"
     * )
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    private $onLine;

    public function __construct()
    {
        $this->people = new ArrayCollection();
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getDatePubli(): ?\DateTimeInterface
    {
        return $this->datePubli;
    }

    public function setDatePubli(\DateTimeInterface $datePubli): self
    {
        $this->datePubli = $datePubli;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getDocPDF(): ?string
    {
        return $this->docPDF;
    }

    public function setDocPDF(?string $docPDF): self
    {
        $this->docPDF = $docPDF;

        return $this;
    }

    public function getNbPeople()
    {
        return count($this->getPeople());
    }

    /**
     * @return Collection|Person[]
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(Person $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people[] = $person;
            $person->addArticle($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->people->removeElement($person)) {
            $person->removeArticle($this);
        }

        return $this;
    }

    public function getRevue(): ?Revue
    {
        return $this->revue;
    }

    public function setRevue(?Revue $revue): self
    {
        $this->revue = $revue;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        // It is required that at least one field changes if you are using doctrine
        // otherwise the event listeners won't be called and the file is lost

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datePubli = new \DateTimeImmutable();
        }
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setPdfFile(?File $pdfFile = null): void
    {
        $this->pdfFile = $pdfFile;

        // It is required that at least one field changes if you are using doctrine
        // otherwise the event listeners won't be called and the file is lost

        if (null !== $pdfFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->datePubli = new \DateTimeImmutable();
        }

    }

    public function getPdfFile(): ?File
    {
        return $this->pdfFile;
    }

    public function setPdfName(?string $pdfName): self
    {
        $this->pdfName = $pdfName;

        return $this;
    }

    public function getOnLine(): ?bool
    {
        return $this->onLine;
    }

    public function setOnLine(bool $onLine): self
    {
        $this->onLine = $onLine;

        return $this;
    }
    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function getPdfName(): ?string
    {
        return $this->pdfName;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->title;
    }

}
