<?php

namespace App\Entity;

use App\Repository\KeyWordsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeyWordsRepository::class)
 */
class KeyWords
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
    private $Word;

    /**
     * @ORM\ManyToMany(targetEntity=Publication::class, mappedBy="keyWords")
     */
    private $publications;

    /**
     * @ORM\ManyToMany(targetEntity=Colloque::class, mappedBy="keyWords")
     */
    private $colloques;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->colloques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWord(): ?string
    {
        return $this->Word;
    }

    public function setWord(string $Word): self
    {
        $this->Word = $Word;

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
            $publication->addKeyWord($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->removeElement($publication)) {
            $publication->removeKeyWord($this);
        }

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->Word;
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
            $colloque->addKeyWord($this);
        }

        return $this;
    }

    public function removeColloque(Colloque $colloque): self
    {
        if ($this->colloques->removeElement($colloque)) {
            $colloque->removeKeyWord($this);
        }

        return $this;
    }
}
