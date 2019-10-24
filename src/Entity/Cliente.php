<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $nome_cliente;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $telefone;

    /**
     * @ORM\Column(type="string")
     */
    private $senha;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ingresso", mappedBy="id_cliente")
     */
    private $id_ingresso;

    public function __construct()
    {
        $this->id_ingresso = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeCliente(): ?string
    {
        return $this->nome_cliente;
    }

    public function setNomeCliente(string $nome_cliente): self
    {
        $this->nome_cliente = $nome_cliente;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * @return Collection|Ingresso[]
     */
    public function getIdIngresso(): Collection
    {
        return $this->id_ingresso;
    }

    public function addIdIngresso(Ingresso $idIngresso): self
    {
        if (!$this->id_ingresso->contains($idIngresso)) {
            $this->id_ingresso[] = $idIngresso;
            $idIngresso->setIdCliente($this);
        }

        return $this;
    }

    public function removeIdIngresso(Ingresso $idIngresso): self
    {
        if ($this->id_ingresso->contains($idIngresso)) {
            $this->id_ingresso->removeElement($idIngresso);
            // set the owning side to null (unless already changed)
            if ($idIngresso->getIdCliente() === $this) {
                $idIngresso->setIdCliente(null);
            }
        }

        return $this;
    }
}
