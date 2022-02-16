<?php

namespace App\Entity;

use App\Repository\RevueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=RevueRepository::class)
 * @Vich\Uploadable
 */
class Revue
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
     * @ORM\Column(type="datetime")
     */
    private $datePubli;


    /**
     * @ORM\OneToMany(targetEntity=Colloque::class, mappedBy="revues")
     */
    private $colloques;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="revue")
     */
    private $articles;

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

    // pour l'image d'illustration--------------------------------------------------------------------------------------------------------------
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @var File
     */
    private $imageName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * @Vich\UploadableField(mapping="revue_image", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $theme;



    public function __construct()
    {
        $this->colloques = new ArrayCollection();
        $this->articles = new ArrayCollection();
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

    /**
     * @return Collection|Colloque[]
     */
    public function getColloques(): Collection
    {
        return $this->colloques;
    }

    public function addColloque(Colloque $colloque): self
    {
        if (!$this->colloques->contains($colloque)) {
            $this->colloques[] = $colloque;
            $colloque->setRevues($this);
        }

        return $this;
    }

    public function removeColloque(Colloque $colloque): self
    {
        if ($this->colloques->removeElement($colloque)) {
            // set the owning side to null (unless already changed)
            if ($colloque->getRevues() === $this) {
                $colloque->setRevues(null);
            }
        }

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
            $article->setRevue($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getRevue() === $this) {
                $article->setRevue(null);
            }
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

    public function getOnLine(): ?bool
    {
        return $this->onLine;
    }

    public function setOnLine(bool $onLine): self
    {
        $this->onLine = $onLine;

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

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
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

}
