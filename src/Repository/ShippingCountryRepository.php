<?php

namespace App\Repository;

use App\Entity\ShippingCountry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ShippingCountry|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShippingCountry|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShippingCountry[]    findAll()
 * @method ShippingCountry[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShippingCountryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ShippingCountry::class);
    }

    // /**
    //  * @return ShippingCountry[] Returns an array of ShippingCountry objects
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
    public function findOneBySomeField($value): ?ShippingCountry
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
