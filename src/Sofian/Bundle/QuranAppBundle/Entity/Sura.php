<?php

namespace Sofian\Bundle\QuranAppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Sofian\Bundle\QuranAppBundle\Entity\LieuRevelation;
use Sofian\Bundle\QuranAppBundle\Entity\QuranText;

/**
 * Sura
 * @ORM\Entity(repositoryClass="Sofian\Bundle\QuranAppBundle\Entity\SuraRepository")
 * @ORM\Table(name="sura", indexes={@ORM\Index(name="FK_sura_lieu_revelation", columns={"lieu_revelation"})})
 */
class Sura
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="translit_titre", type="string", length=255, nullable=false)
     */
    private $translit_titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="debut", type="integer", nullable=false)
     */
    private $debut;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_ayas", type="integer", nullable=false)
     */
    private $nbAyas;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordre_revelation", type="integer", nullable=false)
     */
    private $ordreRevelation;

    /**
     * @var LieuRevelation
     *
     * @ORM\ManyToOne(targetEntity="LieuRevelation", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lieu_revelation", referencedColumnName="id")
     * })
     */
    private $lieuRevelation;
    
    /**
   * @ORM\OneToMany(targetEntity="QuranText", mappedBy="sura")
   */
  private $quranTexts; // ArrayCollection
  
  
  public function __construct()
  {
    $this->quranTexts = new ArrayCollection();
  }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Sura
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set debut
     *
     * @param integer $debut
     * @return Sura
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return integer 
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set nbAyas
     *
     * @param integer $nbAyas
     * @return Sura
     */
    public function setNbAyas($nbAyas)
    {
        $this->nbAyas = $nbAyas;

        return $this;
    }

    /**
     * Get nbAyas
     *
     * @return integer 
     */
    public function getNbAyas()
    {
        return $this->nbAyas;
    }

    /**
     * Set ordreRevelation
     *
     * @param integer $ordreRevelation
     * @return Sura
     */
    public function setOrdreRevelation($ordreRevelation)
    {
        $this->ordreRevelation = $ordreRevelation;

        return $this;
    }

    /**
     * Get ordreRevelation
     *
     * @return integer 
     */
    public function getOrdreRevelation()
    {
        return $this->ordreRevelation;
    }

    /**
     * Set lieuRevelation
     *
     * @param LieuRevelation $lieuRevelation
     * @return Sura
     */
    public function setLieuRevelation( $lieuRevelation = null)
    {
        $this->lieuRevelation = $lieuRevelation;

        return $this;
    }

    /**
     * Get lieuRevelation
     *
     * @return LieuRevelation
     */
    public function getLieuRevelation()
    {
        return $this->lieuRevelation;
    }
    

    /**
     * Add quranTexts
     *
     * @param QuranText $quranTexts
     * @return Sura
     */
    public function addQuranText(QuranText $quranTexts)
    {
        $this->quranTexts->add($quranTexts);

        return $this;
    }

    /**
     * Remove quranTexts
     *
     * @param QuranText $quranTexts
     */
    public function removeQuranText(QuranText $quranTexts)
    {
        $this->quranTexts->removeElement($quranTexts);
    }

    /**
     * Get quranTexts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuranTexts()
    {
        return $this->quranTexts;
    }

    /**
     * @return string
     */
    public function getTranslitTitre()
    {
        return $this->translit_titre;
    }

    /**
     * @param string $translit_titre
     */
    public function setTranslitTitre($translit_titre)
    {
        $this->translit_titre = $translit_titre;
    }
}
