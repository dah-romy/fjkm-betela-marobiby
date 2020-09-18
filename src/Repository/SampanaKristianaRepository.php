<?php

namespace App\Repository;

use App\Entity\SampanaKristiana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SampanaKristiana|null find($id, $lockMode = null, $lockVersion = null)
 * @method SampanaKristiana|null findOneBy(array $criteria, array $orderBy = null)
 * @method SampanaKristiana[]    findAll()
 * @method SampanaKristiana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SampanaKristianaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SampanaKristiana::class);
    }

    // /**
    //  * @return SampanaKristiana[] Returns an array of SampanaKristiana objects
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
    public function findOneBySomeField($value): ?SampanaKristiana
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
