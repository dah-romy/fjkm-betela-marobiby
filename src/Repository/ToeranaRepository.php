<?php

namespace App\Repository;

use App\Entity\Toerana;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Toerana|null find($id, $lockMode = null, $lockVersion = null)
 * @method Toerana|null findOneBy(array $criteria, array $orderBy = null)
 * @method Toerana[]    findAll()
 * @method Toerana[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToeranaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Toerana::class);
    }

    // /**
    //  * @return Toerana[] Returns an array of Toerana objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Toerana
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
