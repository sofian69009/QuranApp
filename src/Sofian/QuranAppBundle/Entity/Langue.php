<?php

namespace Sofian\QuranAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Langue
 *
 * @ORM\Table(name="langue")
 * @ORM\Entity(repositoryClass="Sofian\QuranAppBundle\Repository\LangueRepository")
 */
class Langue
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
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=7, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleCourt", type="string", length=255, unique=true)
     */
    private $libelleCourt;

    /**
     * @var string
     *
     * @ORM\Column(name="libelleLong", type="string", length=255, unique=true)
     */
    private $libelleLong;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code.
     *
     * @param string|null $code
     *
     * @return Langue
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelleCourt.
     *
     * @param string $libelleCourt
     *
     * @return Langue
     */
    public function setLibelleCourt($libelleCourt)
    {
        $this->libelleCourt = $libelleCourt;

        return $this;
    }

    /**
     * Get libelleCourt.
     *
     * @return string
     */
    public function getLibelleCourt()
    {
        return $this->libelleCourt;
    }

    /**
     * Set libelleLong.
     *
     * @param string $libelleLong
     *
     * @return Langue
     */
    public function setLibelleLong($libelleLong)
    {
        $this->libelleLong = $libelleLong;

        return $this;
    }

    /**
     * Get libelleLong.
     *
     * @return string
     */
    public function getLibelleLong()
    {
        return $this->libelleLong;
    }
}
