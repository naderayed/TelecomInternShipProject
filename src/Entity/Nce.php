<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nce
 *
 * @ORM\Table(name="nce")
 * @ORM\Entity
 */
class Nce
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_nce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNce;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=22, nullable=false)

     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="fixe", type="string", length=8, nullable=false)

     */
    private $fixe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etat", type="string", length=11, nullable=true)
     */
    private $etat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="offre", type="string", length=18, nullable=true)
     */
    private $offre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEFVAL", type="string", length=6, nullable=true)
     */
    private $defval;

    /**
     * @var string|null
     *
     * @ORM\Column(name="DEFVAL1", type="string", length=6, nullable=true)
     */
    private $defval1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="VDSL2", type="string", length=5, nullable=true)
     */
    private $vdsl2;

    /**
     * @param string $position
     */
    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    /**
     * @param string $fixe
     */
    public function setFixe(?string $fixe): void
    {
        $this->fixe = $fixe;
    }


    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function getFixe(): ?string
    {
        return $this->fixe;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(?string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getOffre(): ?string
    {
        return $this->offre;
    }

    public function setOffre(?string $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function getDefval(): ?string
    {
        return $this->defval;
    }

    public function setDefval(?string $defval): self
    {
        $this->defval = $defval;

        return $this;
    }

    public function getDefval1(): ?string
    {
        return $this->defval1;
    }

    public function setDefval1(?string $defval1): self
    {
        $this->defval1 = $defval1;

        return $this;
    }

    public function getVdsl2(): ?string
    {
        return $this->vdsl2;
    }

    public function setVdsl2(?string $vdsl2): self
    {
        $this->vdsl2 = $vdsl2;

        return $this;
    }


}
