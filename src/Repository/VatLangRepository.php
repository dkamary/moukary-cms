<?php

namespace App\Repository;

use App\Entity\VatLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VatLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method VatLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method VatLang[]    findAll()
 * @method VatLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VatLangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VatLang::class);
    }

    // /**
    //  * @return VatLang[] Returns an array of VatLang objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VatLang
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
