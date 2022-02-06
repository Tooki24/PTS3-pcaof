<?php

namespace App\Entity;

use App\Repository\RevueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RevueRepository::class)
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePubli;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file;

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

    public function __construct()
    {
        $this->colloques = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getNbArticle(Revue $revue)
    {
        return count($revue->getArticles());
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
}
