<?php

namespace App\Repository;

use App\Entity\Kristiana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kristiana|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kristiana|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kristiana[]    findAll()
 * @method Kristiana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KristianaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kristiana::class);
    }

    // /**
    //  * @return Kristiana[] Returns an array of Kristiana objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kristiana
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
