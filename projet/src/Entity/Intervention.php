<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InterventionRepository::class)
 */
class Intervention
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $heureD;

    /**
     * @ORM\Column(type="time")
     */
    private $heureF;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Person::class, mappedBy="interventions")
     */
    private $people;

    /**
     * @ORM\ManyToOne(targetEntity=Colloque::class, inversedBy="interventions")
     */
    private $colloques;

    public function __construct()
    {
        $this->people = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeureD(): ?\DateTimeInterface
    {
        return $this->heureD;
    }

    public function setHeureD(\DateTimeInterface $heureD): self
    {
        $this->heureD = $heureD;

        return $this;
    }

    public function getHeureF(): ?\DateTimeInterface
    {
        return $this->heureF;
    }

    public function setHeureF(\DateTimeInterface $heureF): self
    {
        $this->heureF = $heureF;

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
            $person->addIntervention($this);
        }

        return $this;
    }

    public function removePerson(Person $person): self
    {
        if ($this->people->removeElement($person)) {
            $person->removeIntervention($this);
        }

        return $this;
    }

    public function getColloques(): ?Colloque
    {
        return $this->colloques;
    }

    public function setColloques(?Colloque $colloques): self
    {
        $this->colloques = $colloques;

        return $this;
    }
}