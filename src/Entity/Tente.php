<?php

namespace App\Entity;

use App\Repository\TenteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TenteRepository::class)]
class Tente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id ;

    #[ORM\Column]
    private ?int $capacite ;

    #[ORM\Column]
    private ?int $nbrperso = null; // Ceci est déjà null par défaut, pas besoin de changer

    #[ORM\Column]
    private ?int $disponibilite = 0; 

    #[ORM\Column(length: 255)]
    private ?string $nom ;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacite(): ?int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): static
    {
        $this->capacite = $capacite;

        return $this;
    }

    public function getNbrperso(): ?int
    {
        return $this->nbrperso;
    }

    public function setNbrperso(int $nbrperso): static
    {
        $this->nbrperso = $nbrperso;

        return $this;
    }

    public function isDisponibilite(): ?int
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(int $disponibilite): static
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
}
