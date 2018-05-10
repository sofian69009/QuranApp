<?php

namespace Sofian\QuranAppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SuraRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SuraRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getSuras(){
        $query = $this->createQueryBuilder('a')
                ->getQuery();
        return $query->getResult();
    }

    /**
     * @return array
     */
    public function getSurasOrderByOrdreRev(){
        $query = $this->createQueryBuilder('a')
                ->orderBy('a.ordreRevelation')
                ->getQuery();
        return $query->getResult();
    }

    /**
     * @return array
     */
    public function getSurasWithTexts(){
        $query = $this->createQueryBuilder('a')
                ->leftJoin('a.quranTexts', 'q')
                ->addSelect('q')
                ->getQuery();
        return $query->getResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSura($id){
        $query = $this->createQueryBuilder('a')
                ->where('a.id = :id')
                ->setParameter('id', $id)
                ->getQuery();
        return $query->getSingleResult();//renvoie une instance de Sura
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSuraWithTexts($id){
        $query = $this->createQueryBuilder('a')
                ->where('a.id = :id')
                ->setParameter('id', $id)
                ->leftJoin('a.lieuRevelation', 'l')
                ->addSelect('l')
                ->leftJoin('a.quranTexts', 'q')
                ->addSelect('q')
                ->getQuery();
        return $query->getSingleResult();
    }

    /**
     * @return mixed
     */
    public function getSurasCount(){
        $query = $this->createQueryBuilder('a')
                ->select('COUNT(a)')
        ->getQuery();
        return $query->getSingleScalarResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSuraStart($id){
        $query = $this->createQueryBuilder('a')
                ->select('a.debut')
                ->where('a.id = :id')
                ->setParameter('id', $id)
                ->getQuery();
        return $query->getSingleScalarResult();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSuraNbAyas($id){
        $query = $this->createQueryBuilder('a')
                ->select('a.nbAyas')
                ->where('a.id = :id')
                ->setParameter('id', $id)
                ->getQuery();
        return $query->getSingleScalarResult();
    }
}