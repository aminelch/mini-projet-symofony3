<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Medecin
 *
 * @ORM\Table(name="medecin")
 * @ORM\Entity(repositoryClass="HopitalBundle\Repository\MedecinRepository")
 */
class Medecin
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
     * @ORM\ManyToOne(targetEntity="Hopital")
     */
    private $hopital;


    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;

    /**
     * @var int
     *
     * @ORM\Column(name="experience", type="integer")
     */
    private $experience;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmbauche", type="datetime")
     */
    private $dateEmbauche;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Medecin
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Medecin
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return Medecin
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set experience
     *
     * @param integer $experience
     *
     * @return Medecin
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return int
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set dateEmbauche
     *
     * @param \DateTime $dateEmbauche
     *
     * @return Medecin
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    /**
     * Get dateEmbauche
     *
     * @return \DateTime
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }


    function getHopital()
    {
        return $this->hopital;
    }
    function setHopital($hopital)
    {
        $this->hopital = $hopital;
    }
}
