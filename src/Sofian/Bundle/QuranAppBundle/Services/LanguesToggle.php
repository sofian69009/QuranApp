<?php
/**
 * Created by PhpStorm.
 * User: sofian
 * Date: 19/07/2016
 * Time: 14:36
 */

namespace Sofian\Bundle\QuranAppBundle\Services;


use Doctrine\ORM\EntityManager;

class LanguesToggle
{
    private $em;
    private $langs = ['ar', 'fr', 'en', 'es', 'it', 'tr'];
    private $lang;

    /**
     * LanguesToggle constructor.
     * @param EntityManager $em
     * @param string $lang
     */
    public function __construct(EntityManager $em)
{
    $this->em = $em;
    $this->lang = $this->langs[0];
}

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }


}