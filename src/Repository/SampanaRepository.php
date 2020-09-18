<?php

namespace App\Repository;

use App\Entity\Sampana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sampana|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sampana|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sampana[]    findAll()
 * @method Sampana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SampanaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sampana::class);
    }

    // /**
    //  * @return Sampana[] Returns an array of Sampana objects
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
    public function findOneBySomeField($value): ?Sampana
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
