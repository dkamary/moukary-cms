<?php

namespace App\Repository;

use App\Entity\CommandStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommandStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandStatus[]    findAll()
 * @method CommandStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandStatus::class);
    }

    // /**
    //  * @return CommandStatus[] Returns an array of CommandStatus objects
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
    public function findOneBySomeField($value): ?CommandStatus
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
