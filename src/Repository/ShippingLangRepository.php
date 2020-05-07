<?php

namespace App\Repository;

use App\Entity\ShippingLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShippingLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShippingLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShippingLang[]    findAll()
 * @method ShippingLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShippingLangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShippingLang::class);
    }

    // /**
    //  * @return ShippingLang[] Returns an array of ShippingLang objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShippingLang
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
