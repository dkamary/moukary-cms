<?php

namespace App\Repository;

use App\Entity\ProductShipping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductShipping|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductShipping|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductShipping[]    findAll()
 * @method ProductShipping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductShippingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductShipping::class);
    }

    // /**
    //  * @return ProductShipping[] Returns an array of ProductShipping objects
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
    public function findOneBySomeField($value): ?ProductShipping
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
