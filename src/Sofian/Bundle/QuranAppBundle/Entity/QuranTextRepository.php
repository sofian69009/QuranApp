<?php

namespace Sofian\Bundle\QuranAppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * QuranTextRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuranTextRepository extends EntityRepository
{   
    public function getQuranTextById($id){
        
        $qb = $this->createQueryBuilder('a')
        ->where('a.index = :index')
        ->setParameter('index', $id)
        ->getQuery();
        return $qb->getSingleResult(); //renvoie une instance de QuranText
    }
}