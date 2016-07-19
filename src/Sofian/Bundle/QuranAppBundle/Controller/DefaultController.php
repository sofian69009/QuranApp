<?php

namespace Sofian\Bundle\QuranAppBundle\Controller;


use Sofian\Bundle\QuranAppBundle\Entity\SuraRepository;
use Sofian\Bundle\QuranAppBundle\Form\SuraSelectType;
use Symfony\Component\HttpFoundation\Request;
use Sofian\Bundle\QuranAppBundle\Entity\Sura;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {

        return $this->render('SofianQuranAppBundle:Default:index.html.twig');
    }

    /**
     * @param Request $r
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sideBarAction(Request $r){

        $em = $this->getDoctrine()->getManager();

        /** @var SuraRepository $suraRepo */
        $suraRepo = $em->getRepository('SofianQuranAppBundle:Sura');
        $suras = $suraRepo->getSuras();

        return $this->render('SofianQuranAppBundle:Default:suraSideMenu.html.twig', array(
            'suras' => $suras
        ));

    }
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
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
        return $this->render('SofianQuranAppBundle:Default:quran.html.twig', array(
                    'suras' => $suras));
    }

    /**
     * @param Request $request
     * @param $suraId
     * @return \Symfony\Component\HttpFoundation\Response
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
            return $this->render('SofianQuranAppBundle:Default:sura.html.twig', array(  
                'titre' => $titre,
                'translit' => $titreTranslit,
                'id' => $id,
                'debut' => $debut,
                'fin' => $fin,
                'suraTexts' => $suraTexts
                    ));
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