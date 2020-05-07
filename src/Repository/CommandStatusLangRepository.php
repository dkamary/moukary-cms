<?php

namespace App\Repository;

use App\Entity\CommandStatusLang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommandStatusLang|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandStatusLang|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandStatusLang[]    findAll()
 * @method CommandStatusLang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandStatusLangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandStatusLang::class);
    }

    // /**
    //  * @return CommandStatusLang[] Returns an array of CommandStatusLang objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommandStatusLang
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
