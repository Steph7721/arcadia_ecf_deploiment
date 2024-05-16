<?php

namespace App\Entity;

use App\Repository\RapportEmployeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportEmployeRepository::class)]
class RapportEmploye
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $repasDonne = null;

    #[ORM\Column]
    private ?int $grammageDonne = null;

    #[ORM\ManyToOne(inversedBy: 'rapportEmployes')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'rapportEmployes')]
    private ?Animal $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getRepasDonne(): ?string
    {
        return $this->repasDonne;
    }

    public function setRepasDonne(string $repasDonne): static
    {
        $this->repasDonne = $repasDonne;

        return $this;
    }

    public function getGrammageDonne(): ?int
    {
        return $this->grammageDonne;
    }

    public function setGrammageDonne(int $grammageDonne): static
    {
        $this->grammageDonne = $grammageDonne;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
