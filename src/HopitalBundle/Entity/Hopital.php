<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hopital
 *
 * @ORM\Table(name="hopital")
 * @ORM\Entity(repositoryClass="HopitalBundle\Repository\HopitalRepository")
 */
class Hopital
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomHopital", type="string", length=255, unique=true)
     */
    private $nomHopital;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseHopital", type="string", length=255)
     */
    private $adresseHopital;

    /**
     * @var string
     *
     * @ORM\Column(name="typeHopital", type="string", length=255)
     */
    private $typeHopital;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomHopital
     *
     * @param string $nomHopital
     *
     * @return Hopital
     */
    public function setNomHopital($nomHopital)
    {
        $this->nomHopital = $nomHopital;

        return $this;
    }

    /**
     * Get nomHopital
     *
     * @return string
     */
    public function getNomHopital()
    {
        return $this->nomHopital;
    }

    /**
     * Set adresseHopital
     *
     * @param string $adresseHopital
     *
     * @return Hopital
     */
    public function setAdresseHopital($adresseHopital)
    {
        $this->adresseHopital = $adresseHopital;

        return $this;
    }

    /**
     * Get adresseHopital
     *
     * @return string
     */
    public function getAdresseHopital()
    {
        return $this->adresseHopital;
    }

    /**
     * Set typeHopital
     *
     * @param string $typeHopital
     *
     * @return Hopital
     */
    public function setTypeHopital($typeHopital)
    {
        $this->typeHopital = $typeHopital;

        return $this;
    }

    /**
     * Get typeHopital
     *
     * @return string
     */
    public function getTypeHopital()
    {
        return $this->typeHopital;
    }
}

