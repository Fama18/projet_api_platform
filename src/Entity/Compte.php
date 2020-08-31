<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompteRepository;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;


/**
 * @ApiResource(normalizationContext={"groups"= {"compte"}})
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"numerocompte": "partial"})
 */
class Compte
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $numeroagence;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $numerocompte;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $clerib;

    /**
     * @ORM\ManyToOne(targetEntity=ClientPhysique::class, inversedBy="comptes")
     */
    private $clientphysique;

    /**
     * @ORM\ManyToOne(targetEntity=ClientMoral::class, inversedBy="comptes")
     */
    private $clientmoral;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCompte::class, inversedBy="comptes")
     */
    private $typecompte;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="compte")
     * @Groups({"compte"})
     */
    private $operations;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"compte"})
     */
    private $solde;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroagence(): ?string
    {
        return $this->numeroagence;
    }

    public function setNumeroagence(string $numeroagence): self
    {
        $this->numeroagence = $numeroagence;

        return $this;
    }

    public function getNumerocompte(): ?string
    {
        return $this->numerocompte;
    }

    public function setNumerocompte(string $numerocompte): self
    {
        $this->numerocompte = $numerocompte;

        return $this;
    }

    public function getClerib(): ?string
    {
        return $this->clerib;
    }

    public function setClerib(string $clerib): self
    {
        $this->clerib = $clerib;

        return $this;
    }

    public function getClientphysique(): ?ClientPhysique
    {
        return $this->clientphysique;
    }

    public function setClientphysique(?ClientPhysique $clientphysique): self
    {
        $this->clientphysique = $clientphysique;

        return $this;
    }

    public function getClientmoral(): ?ClientMoral
    {
        return $this->clientmoral;
    }

    public function setClientmoral(?ClientMoral $clientmoral): self
    {
        $this->clientmoral = $clientmoral;

        return $this;
    }

    public function getTypecompte(): ?TypeCompte
    {
        return $this->typecompte;
    }

    public function setTypecompte(?TypeCompte $typecompte): self
    {
        $this->typecompte = $typecompte;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setCompte($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCompte() === $this) {
                $operation->setCompte(null);
            }
        }

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }


}
