<?php

namespace App\Entity;

use App\Repository\RapportVeterinaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportVeterinaireRepository::class)]
class RapportVeterinaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $detail = null;

    #[ORM\ManyToOne(inversedBy: 'rapportVeterinaires')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'rapportVeterinaires')]
    private ?Animal $animal = null;

    #[ORM\Column(length: 255)]
    private ?string $repasConseille = null;

    #[ORM\Column]
    private ?int $grammageConseille = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\ManyToOne(inversedBy: 'etat')]
    private ?Animal $animaletat = null;

    public function __construct()
    {
        $this->nourritures = new ArrayCollection();
    }

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

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): static
    {
        $this->detail = $detail;

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

    public function getRepasConseille(): ?string
    {
        return $this->repasConseille;
    }

    public function setRepasConseille(string $repasConseille): static
    {
        $this->repasConseille = $repasConseille;

        return $this;
    }

    public function getGrammageConseille(): ?int
    {
        return $this->grammageConseille;
    }

    public function setGrammageConseille(int $grammageConseille): static
    {
        $this->grammageConseille = $grammageConseille;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getAnimaletat(): ?Animal
    {
        return $this->animaletat;
    }

    public function setAnimaletat(?Animal $animaletat): static
    {
        $this->animaletat = $animaletat;

        return $this;
    }
}
