<?php

namespace App\Repository;

use App\Entity\EmailLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EmailLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailLang[]    findAll()
 * @method EmailLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailLangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmailLang::class);
    }

    // /**
    //  * @return EmailLang[] Returns an array of EmailLang objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmailLang
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
