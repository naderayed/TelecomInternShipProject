<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Workflow
 *
 * @ORM\Table(name="workflow")
 * @ORM\Entity
 */
class Workflow



{

    /**
     * @var int
     *
     * @ORM\Column(name="id_workFlow", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idworkFlow;
    /**
     * @var string|null
     *
     * @ORM\Column(name="n_Appel", type="string", length=24, nullable=true)
     */
    private $nAppel;
    /**
     * @var string
     *
     * @ORM\Column(name="id_Contrat", type="string", length=10, nullable=false)
     */
    private $idContrat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="client", type="string", length=49, nullable=true)
     */
    private $client;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nature_service", type="string", length=14, nullable=true)
     */
    private $natureService;

    /**
     * @var string|null
     *
     * @ORM\Column(name="debit", type="string", length=8, nullable=true)
     */
    private $debit;

    /**
     * @var string|null
     *
     * @ORM\Column(name="central", type="string", length=27, nullable=true)
     */
    private $central;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fsi", type="string", length=9, nullable=true)
     */
    private $fsi;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etat", type="string", length=10, nullable=true)
     */
    private $etat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_mesTT", type="string", length=16, nullable=true)
     */
    private $dateMestt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="position", type="string", length=81, nullable=true)
     */
    private $position;

    public function getNAppel(): ?string
    {
        return $this->nAppel;
    }

    public function setNAppel(?string $nAppel): self
    {
        $this->nAppel = $nAppel;

        return $this;
    }

    public function getIdContrat(): ?string
    {
        return $this->idContrat;
    }

    /**
     * @param string $idContrat
     */
    public function setIdContrat(string $idContrat): void
    {
        $this->idContrat = $idContrat;
    }


    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(?string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getNatureService(): ?string
    {
        return $this->natureService;
    }

    public function setNatureService(?string $natureService): self
    {
        $this->natureService = $natureService;

        return $this;
    }

    public function getDebit(): ?string
    {
        return $this->debit;
    }

    public function setDebit(?string $debit): self
    {
        $this->debit = $debit;

        return $this;
    }

    public function getCentral(): ?string
    {
        return $this->central;
    }

    public function setCentral(?string $central): self
    {
        $this->central = $central;

        return $this;
    }

    public function getFsi(): ?string
    {
        return $this->fsi;
    }

    public function setFsi(?string $fsi): self
    {
        $this->fsi = $fsi;

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

    /**
     * @return int
     */
    public function getIdworkFlow(): int
    {
        return $this->idworkFlow;
    }

    /**
     * @param int $idworkFlow
     */
    public function setIdworkFlow(int $idworkFlow): void
    {
        $this->idworkFlow = $idworkFlow;
    }

    public function getDateMestt(): ?string
    {
        return $this->dateMestt;
    }

    public function setDateMestt(?string $dateMestt): self
    {
        $this->dateMestt = $dateMestt;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }


}
