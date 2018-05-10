<?php

namespace Sofian\QuranAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuranText
 *
 * @ORM\Table(name="quran_text", indexes={@ORM\Index(name="FK_quran_text_sura", columns={"sura"})})
 * @ORM\Entity(repositoryClass="Sofian\QuranAppBundle\Repository\QuranTextRepository")
 */
class QuranText // supl single quotes in column name if column name is sql reserved keyword (eg = index, count, ect)
{
    /**
     * @var integer
     *
     * @ORM\Column(name="`index`", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $index;

    /**
     * @var integer
     *
     * @ORM\Column(name="aya", type="integer", nullable=false)
     */
    private $aya;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="fr_trad", type="text", nullable=false)
     */
    private $frTrad;

    /**
     * @var string
     *
     * @ORM\Column(name="en_trad", type="text", nullable=false)
     */
    private $enTrad;

    /**
     * @var string
     *
     * @ORM\Column(name="translit_text", type="text", nullable=false)
     */
    private $translitText;

    /**
     * @var string
     *
     * @ORM\Column(name="es_trad", type="text", nullable=false)
     */
    private $esTrad;

    /**
     * @var string
     *
     * @ORM\Column(name="it_trad", type="text", nullable=false)
     */
    private $itTrad;

    /**
     * @var string
     *
     * @ORM\Column(name="tr_trad", type="text", nullable=false)
     */
    private $trTrad;

    /**
     * @var \Sura
     *
     * @ORM\ManyToOne(targetEntity="Sura", inversedBy="quranTexts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sura", referencedColumnName="id")
     * })
     */
    private $sura;



    /**
     * Get index
     *
     * @return integer 
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Set aya
     *
     * @param integer $aya
     * @return QuranText
     */
    public function setAya($aya)
    {
        $this->aya = $aya;

        return $this;
    }

    /**
     * Get aya
     *
     * @return integer 
     */
    public function getAya()
    {
        return $this->aya;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return QuranText
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set frTrad
     *
     * @param string $frTrad
     * @return QuranText
     */
    public function setFrTrad($frTrad)
    {
        $this->frTrad = $frTrad;

        return $this;
    }

    /**
     * Get frTrad
     *
     * @return string 
     */
    public function getFrTrad()
    {
        return $this->frTrad;
    }

    /**
     * Set enTrad
     *
     * @param string $enTrad
     * @return QuranText
     */
    public function setEnTrad($enTrad)
    {
        $this->enTrad = $enTrad;

        return $this;
    }

    /**
     * Get enTrad
     *
     * @return string 
     */
    public function getEnTrad()
    {
        return $this->enTrad;
    }

    /**
     * Set translitText
     *
     * @param string $translitText
     * @return QuranText
     */
    public function setTranslitText($translitText)
    {
        $this->translitText = $translitText;

        return $this;
    }

    /**
     * Get translitText
     *
     * @return string 
     */
    public function getTranslitText()
    {
        return $this->translitText;
    }

    /**
     * Set esTrad
     *
     * @param string $esTrad
     * @return QuranText
     */
    public function setEsTrad($esTrad)
    {
        $this->esTrad = $esTrad;

        return $this;
    }

    /**
     * Get esTrad
     *
     * @return string 
     */
    public function getEsTrad()
    {
        return $this->esTrad;
    }

    /**
     * Set itTrad
     *
     * @param string $itTrad
     * @return QuranText
     */
    public function setItTrad($itTrad)
    {
        $this->itTrad = $itTrad;

        return $this;
    }

    /**
     * Get itTrad
     *
     * @return string 
     */
    public function getItTrad()
    {
        return $this->itTrad;
    }

    /**
     * Set trTrad
     *
     * @param string $trTrad
     * @return QuranText
     */
    public function setTrTrad($trTrad)
    {
        $this->trTrad = $trTrad;

        return $this;
    }

    /**
     * Get trTrad
     *
     * @return string 
     */
    public function getTrTrad()
    {
        return $this->trTrad;
    }

    /**
     * Set sura
     *
     * @param \Sofian\QuranAppBundle\Entity\Sura $sura
     * @return QuranText
     */
    public function setSura(\Sofian\QuranAppBundle\Entity\Sura $sura = null)
    {
        $this->sura = $sura;

        return $this;
    }

    /**
     * Get sura
     *
     * @return \Sofian\QuranAppBundle\Entity\Sura
     */
    public function getSura()
    {
        return $this->sura;
    }
}
