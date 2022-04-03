<?php

namespace App\Entity;

use App\Repository\ColloqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;


/**
 * @ORM\Entity(repositoryClass=ColloqueRepository::class)
 * @Vich\Uploadable
 */
class Colloque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateD;

    /**
     * @ORM\Column(type="date")
     */
    private $dateF;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $place;

    /**
     * @ORM\Column(type="text")
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity=Revue::class, inversedBy="colloques")
     */
    private $revues;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(
     *     pattern="/^[a-z0-9\-]+$/",
     *     message="Le slug ne peut contenir que des lettres , nombres ou tirets"
     * )
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: expression qui verifie si la fin du tring contiens ".pdf" (verification pour eviter d'upload des fichiers non voulus),
     //TODO faire verifier le message d'erreur
     * @var File
     */
    private $planningPdfName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property
     * @Assert\File(
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Le fichier doit être un PDF"
     * )
     * @Vich\UploadableField(mapping="colloque_pdf", fileNameProperty="planningPdfName")
     * @var File
     */
    private $planningPdfFile;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPcaof;

    /**
     * @ORM\Column(type="boolean")
     */
    private $onLine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $theme;

    /**
     * @ORM\ManyToMany(targetEntity=KeyWords::class, inversedBy="colloques")
     */
    private $keyWords;


    public function __construct()
    {
        $this->people = new ArrayCollection();
        $this->keyWords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateD(): ?\DateTimeInterface
    {
        return $this->dateD;
    }

    public function setDateD(\DateTimeInterface $dateD): self
    {
        $this->dateD = $dateD;

        return $this;
    }

    public function getDateF(): ?\DateTimeInterface
    {
        return $this->dateF;
    }

    public function setDateF(\DateTimeInterface $dateF): self
    {
        $this->dateF = $dateF;

        return $this;
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

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

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

    public function getRevues(): ?Revue
    {
        return $this->revues;
    }

    public function setRevues(?Revue $revues): self
    {
        $this->revues = $revues;

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

    public function getIsPcaof(): ?bool
    {
        return $this->isPcaof;
    }

    public function setIsPcaof(bool $isPcaof): self
    {
        $this->isPcaof = $isPcaof;

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


    public function setPlanningPdfFile(?File $pdfFile = null): void
    {
        $this->planningPdfFile = $pdfFile;

        // It is required that at least one field changes if you are using doctrine
        // otherwise the event listeners won't be called and the file is lost

        if (null !== $pdfFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->dateD = new \DateTimeImmutable();
        }

    }

    public function getPlanningPdfFile(): ?File
    {
        return $this->planningPdfFile;
    }

    public function setPlanningPdfName(?string $planningPdfName): self
    {
        $this->planningPdfName = $planningPdfName;

        return $this;
    }

    public function getPlanningPdfName(): ?string
    {
        return $this->planningPdfName;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

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

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }


}