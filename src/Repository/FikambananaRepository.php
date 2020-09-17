<?php

namespace App\Repository;

use App\Entity\Fikambanana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fikambanana|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fikambanana|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fikambanana[]    findAll()
 * @method Fikambanana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FikambananaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fikambanana::class);
    }

    // /**
    //  * @return Fikambanana[] Returns an array of Fikambanana objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fikambanana
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
