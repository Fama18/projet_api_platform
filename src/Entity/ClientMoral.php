<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ClientMoralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ClientMoralRepository::class)
 */
class ClientMoral
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
    private $nomentreprise;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $adresseentreprise;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $raisonsocial;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $numident;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="clientmoral")
     */
    private $comptes;

    /**
     * @ORM\OneToMany(targetEntity=ClientPhysique::class, mappedBy="clientmoral")
     */
    private $clientphysiques;

    public function __construct()
    {
        $this->comptes = new ArrayCollection();
        $this->clientphysiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomentreprise(): ?string
    {
        return $this->nomentreprise;
    }

    public function setNomentreprise(string $nomentreprise): self
    {
        $this->nomentreprise = $nomentreprise;

        return $this;
    }

    public function getAdresseentreprise(): ?string
    {
        return $this->adresseentreprise;
    }

    public function setAdresseentreprise(string $adresseentreprise): self
    {
        $this->adresseentreprise = $adresseentreprise;

        return $this;
    }

    public function getRaisonsocial(): ?string
    {
        return $this->raisonsocial;
    }

    public function setRaisonsocial(string $raisonsocial): self
    {
        $this->raisonsocial = $raisonsocial;

        return $this;
    }

    public function getNumident(): ?string
    {
        return $this->numident;
    }

    public function setNumident(string $numident): self
    {
        $this->numident = $numident;

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getComptes(): Collection
    {
        return $this->comptes;
    }

    public function addCompte(Compte $compte): self
    {
        if (!$this->comptes->contains($compte)) {
            $this->comptes[] = $compte;
            $compte->setClientmoral($this);
        }

        return $this;
    }

    public function removeCompte(Compte $compte): self
    {
        if ($this->comptes->contains($compte)) {
            $this->comptes->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getClientmoral() === $this) {
                $compte->setClientmoral(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ClientPhysique[]
     */
    public function getClientphysiques(): Collection
    {
        return $this->clientphysiques;
    }

    public function addClientphysique(ClientPhysique $clientphysique): self
    {
        if (!$this->clientphysiques->contains($clientphysique)) {
            $this->clientphysiques[] = $clientphysique;
            $clientphysique->setClientmoral($this);
        }

        return $this;
    }

    public function removeClientphysique(ClientPhysique $clientphysique): self
    {
        if ($this->clientphysiques->contains($clientphysique)) {
            $this->clientphysiques->removeElement($clientphysique);
            // set the owning side to null (unless already changed)
            if ($clientphysique->getClientmoral() === $this) {
                $clientphysique->setClientmoral(null);
            }
        }

        return $this;
    }
}
