<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\OperationRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"compte"})
     */
    private $dateoperation;


    /**
     * @ORM\ManyToOne(targetEntity=TypeOperation::class, inversedBy="operations")
     * @Groups({"compte"})
     */
    private $typeoperation;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="operations")
     */
    private $compte;

    public function __construct()
    {
        $this->compte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateoperation(): ?string
    {
        return $this->dateoperation;
    }

    public function setDateoperation(string $dateoperation): self
    {
        $this->dateoperation = $dateoperation;

        return $this;
    }


    public function getTypeoperation(): ?TypeOperation
    {
        return $this->typeoperation;
    }

    public function setTypeoperation(?TypeOperation $typeoperation): self
    {
        $this->typeoperation = $typeoperation;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }
}
