<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 * @Vich\Uploadable
 */
class Publication
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


    // pour l'image d'illustration--------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="publication_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    //pour le pdf de la publication -------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * NOTE: expression qui verifie si la fin du tring contiens ".pdf" (verification pour eviter d'upload des fichiers non voulus),
     * ) //TODO faire verifier le message d'erreur
     * @var File
     */
    private $pdfName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="publication_pdf", fileNameProperty="pdfName")
     * @var File
     */
    private $pdfFile;

    //pour le reste -------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="datetime")
     */
    private $datePubli;

    /**
     * @ORM\ManyToMany(targetEntity=Person::class, mappedBy="publications")
     */
    private $people;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/^[a-z0-9\-]+$/",
     *     message="Le slug ne peut contenir que des lettres , nombres ou tirets"
     * ) //TODO faire verifier le message d'erreur
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=KeyWords::class, inversedBy="publications")
     */
    private $keyWords;

    /**
     * @ORM\Column(type="boolean")
     */
    private $onLine;

    public function __construct()
    {
        $this->people = new ArrayCollection();
        $this->keyWords = new ArrayCollection();
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

        if (null !== $title) {
            //set la date auto des la creation de l'entitée
            $this->datePubli = new \DateTimeImmutable();
        }

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

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getPdfName(): ?string
    {
        return $this->pdfName;
    }

    public function setPdfName(?string $pdfName): self
    {
        $this->pdfName = $pdfName;

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
            $person->addPublication($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->people->removeElement($person)) {
            $person->removePublication($this);
        }

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

    /**
     * @return Collection|KeyWords[]
     */
    public function getKeyWords(): Collection
    {
        return $this->keyWords;
    }

    public function addKeyWord(KeyWords $keyWord): self
    {
        if (!$this->keyWords->contains($keyWord)) {
            $this->keyWords[] = $keyWord;
        }

        return $this;
    }

    public function removeKeyWord(KeyWords $keyWord): self
    {
        $this->keyWords->removeElement($keyWord);

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

    public function getOnLine(): ?bool
    {
        return $this->onLine;
    }

    public function setOnLine(bool $onLine): self
    {
        $this->onLine = $onLine;

        return $this;
    }

}
