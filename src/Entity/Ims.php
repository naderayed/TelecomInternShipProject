<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ims
 *
 * @ORM\Table(name="ims")
 * @ORM\Entity
 */
class Ims
{
    /**
     * @var int
     *
     * @ORM\Column(name="ims_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIms;

    /**
     * @var string
     * @ORM\Column(name="abonne", type="string", length=99, nullable=false)
     */
    private $abonne;



    /**
     * @var int
     * @ORM\Column(name="fixe", type="integer", nullable=false)
     */
    private $fixe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uls", type="string", length=12, nullable=true)
     */
    private $uls;

    /**
     * @var string|null
     * @ORM\Column(name="distribution", type="string", length=12, nullable=true)
     */
    private $distribution;
    /**
     * @var string|null
     * @ORM\Column(name="transport", type="string", length=12, nullable=true)
     */
    private $transport;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rg", type="string", length=8, nullable=true)
     */
    private $rg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sr", type="string", length=14, nullable=true)
     */
    private $sr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=142, nullable=true)
     */
    private $adresse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=13, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etat", type="string", length=10, nullable=true)
     */
    private $etat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="data", type="string", length=15, nullable=true)
     */
    private $data;

    /**
     * @param string $abonne
     */
    public function setAbonne(string $abonne): void
    {
        $this->abonne = $abonne;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="offre", type="string", length=27, nullable=true)
     */
    private $offre;





    /**
     * @var string|null
     * @ORM\Column(name="rack", type="string", length=10, nullable=true)
     */
    private $rack;

    /**
     * @var int|null
     *
     * @ORM\Column(name="shelf", type="integer", nullable=true)
     */
    private $shelf;

    /**
     * @var int|null
     *
     * @ORM\Column(name="slot", type="integer", nullable=true)
     */
    private $slot;

    /**
     * @var int|null
     *
     * @ORM\Column(name="port", type="integer", nullable=true)
     */
    private $port;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tid", type="integer", nullable=true)
     */
    private $tid;

    public function getAbonne(): ?string
    {
        return $this->abonne;
    }

    public function getFixe(): ?int
    {
        return $this->fixe;
    }

    public function getUls(): ?string
    {
        return $this->uls;
    }

    public function setUls(?string $uls): self
    {
        $this->uls = $uls;

        return $this;
    }

    public function getRg(): ?string
    {
        return $this->rg;
    }

    public function setRg(?string $rg): self
    {
        $this->rg = $rg;

        return $this;
    }

    public function getSr(): ?string
    {
        return $this->sr;
    }

    public function setSr(?string $sr): self
    {
        $this->sr = $sr;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

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

    public function getTransport(): ?string
    {
        return $this->transport;
    }

    public function setTransport(?string $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getDistribution(): ?string
    {
        return $this->distribution;
    }
    /**
     * @param int $fixe
     */
    public function setFixe(?int $fixe): void
    {
        $this->fixe = $fixe;
    }

    public function setDistribution(?string $distribution): self
    {
        $this->distribution = $distribution;

        return $this;
    }

    public function getRack(): ?string
    {
        return $this->rack;
    }

    public function setRack(?string $rack): self
    {
        $this->rack = $rack;

        return $this;
    }

    public function getShelf(): ?int
    {
        return $this->shelf;
    }

    public function setShelf(?int $shelf): self
    {
        $this->shelf = $shelf;

        return $this;
    }

    public function getSlot(): ?int
    {
        return $this->slot;
    }

    public function setSlot(?int $slot): self
    {
        $this->slot = $slot;

        return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function setPort(?int $port): self
    {
        $this->port = $port;

        return $this;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(?int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }


}
