<?php

namespace Sofian\QuranAppBundle\Controller;


use Sofian\QuranAppBundle\Entity\SuraRepository;
use Sofian\QuranAppBundle\Form\SuraSelectType;
use Symfony\Component\HttpFoundation\Request;
use Sofian\QuranAppBundle\Entity\Sura;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DefaultController extends Controller {


    /**
     * @Template()
     * @Route(name="sofian_quran_app_homepage", path="/")
     */
    public function indexAction() {

        return array();
    }

    /**
     * @param Request $r
     */
    public function souraSideMenuAction(Request $r){

        $em = $this->getDoctrine()->getManager();

        /** @var SuraRepository $suraRepo */
        $suraRepo = $em->getRepository('SofianQuranAppBundle:Sura');
        $suras = $suraRepo->getSuras();
        return $this->render("@SofianQuranApp/Default/sura_side_menu.html.twig", array(
            'suras' => $suras
        ));

    }
    /**
     * @param Request $request
     * @Template()
     * @Route(name="sofian_quran_app_quran_index", path="/Quran")
     */
    public function quranIndexAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $sort = $request->query->get('sort');
        $limit = $request->query->get('limit');
        if (!isset($limit)){
            $limit = 19;
        }
        if (isset($sort) && $sort === "ordreRevelation"){
            $paginator = $this->get('knp_paginator');
            $target = $em->getRepository('SofianQuranAppBundle:Sura')->getSurasOrderByOrdreRev();
            $suras = $paginator->paginate($target, $request->query->get('page', 1), $limit);
        }
        else {
        //////
        $paginator = $this->get('knp_paginator');
        $target = $em->getRepository('SofianQuranAppBundle:Sura')->getSuras();
        $suras = $paginator->paginate($target, $request->query->get('page', 1), $limit);
        }
        return array(
            'suras' => $suras
        );
    }

    /**
     * @param Request $request
     * @param $suraId
     * @Template()
     * @Route(name="sofian_quran_app_sura", path="/Quran/sura/{suraId}")
     */
    public function quranSuraAction(Request $request, $suraId) {
        $em = $this->getDoctrine()->getManager();
        if (!isset($suraId) ){
            $suraId = 1;
        }

        $paginator = $this->get('knp_paginator');
        /** @var Sura $target */
        $target = $em->getRepository('SofianQuranAppBundle:Sura')->getSuraWithTexts($suraId);
            $suraTexts = $paginator->paginate($target->getQuranTexts(), $request->query->get('page', 1), 6);
            $titre = $target->getTitre();
            $titreTranslit = $target->getTranslitTitre();
            $id = $target->getId();
            $debut = $target->getDebut();
            $fin = $target->getNbAyas()-$debut;
            return array(
                'titre' => $titre,
                'translit' => $titreTranslit,
                'id' => $id,
                'debut' => $debut,
                'fin' => $fin,
                'suraTexts' => $suraTexts
            );
    }

    /**
     * method to add data from array like data object eg translations,
     * setting data as a service first then use it here
     * @return \Symfony\Component\HttpFoundation\Response
     */
   /** public function writeTranslitTitlesAction(){

        $quranMetaData = $this->get('sofian_quran_app.translit_titles')->getSuraMetaDatas();
        $em = $this->getDoctrine()->getEntityManager();
        $i = 0;

        /** @var SuraRepository $suraRepo */
   /**
        $suraRepo = $em->getRepository('SofianQuranAppBundle:Sura');
        $suras = $suraRepo->getSuras();

            foreach ($quranMetaData as $s){
                $translitTitle = $s[5];
                $suras[$i]->setTranslitTitre($translitTitle);
                $i++;
            }
        $em->flush();
        return $this->render('SofianQuranAppBundle:Default:translitTitleAdder.html.twig');
        }
        **/
}
/**
     * Paginates anything (depending on event listeners)
     * into Pagination object, which is a view targeted
     * pagination object (might be aggregated helper object)
     * responsible for the pagination result representation
     *
     * @param mixed $target - anything what needs to be paginated
     * @param integer $page - page number, starting from 1
     * @param integer $limit - number of items per page
     * @param array $options - less used options:
     *     boolean $distinct - default true for distinction of results
     *     string $alias - pagination alias, default none
     *     array $whitelist - sortable whitelist for target fields being paginated
     * @throws \LogicException
     * @return \Knp\Component\Pager\Pagination\PaginationInterface
     */