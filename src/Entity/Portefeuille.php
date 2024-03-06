<?php

namespace App\Entity;

use App\Repository\PortefeuilleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortefeuilleRepository::class)]
class Portefeuille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 10)]
    private ?string $Symbole = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Quantity = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $valeurActuelle = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAjout = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSymbole(): ?string
    {
        return $this->Symbole;
    }

    public function setSymbole(string $Symbole): static
    {
        $this->Symbole = $Symbole;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->Quantity;
    }

    public function setQuantity(string $Quantity): static
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getValeurActuelle(): ?string
    {
        return $this->valeurActuelle;
    }

    public function setValeurActuelle(string $valeurActuelle): static
    {
        $this->valeurActuelle = $valeurActuelle;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTimeInterface $dateAjout): static
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

     /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private ?float $valeurInitiale = 500.00;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="portefeuille", cascade={"persist", "remove"})
     */
    private ?User $user = null;

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getValeurInitiale(): ?float
    {
        return $this->valeurInitiale;
    }

    public function setValeurInitiale(float $valeurInitiale): self
    {
        $this->valeurInitiale = $valeurInitiale;

        return $this;
    }
}
