<?php
/**
 * Created by PhpStorm.
 * User: MON ASUS
 * Date: 19/02/2019
 * Time: 00:35
 */

namespace FixBundle\Repository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRespository extends \Doctrine\ORM\EntityRepository
{

    public function findBySouscategorie($id){
        $query=$this->getEntityManager()
            ->createQuery(
                "SELECT s         
                FROM FixBundle:Post s 
                WHERE s.souscategorie=:souscategorie
       ")->setParameter('souscategorie',$id);
        return $query->getResult();
    }

}