<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\ManyToMany(targetEntity=Colloque::class, inversedBy="people")
     */
    private $colloques;

    /**
     * @ORM\ManyToMany(targetEntity=Intervention::class, inversedBy="people")
     */
    private $interventions;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->colloques = new ArrayCollection();
        $this->interventions = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeColloque(Colloque $colloque): self
    {
        $this->colloques->removeElement($colloque);

        return $this;
    }

    /**
     * @return Collection|Intervention[]
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        $this->interventions->removeElement($intervention);

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }
}
