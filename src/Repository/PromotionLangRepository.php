<?php

namespace App\Repository;

use App\Entity\PromotionLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PromotionLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method PromotionLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method PromotionLang[]    findAll()
 * @method PromotionLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotionLangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PromotionLang::class);
    }

    // /**
    //  * @return PromotionLang[] Returns an array of PromotionLang objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PromotionLang
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
