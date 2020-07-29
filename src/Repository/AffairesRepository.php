<?php

namespace App\Repository;

use App\Entity\Affaires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Affaires|null find($id, $lockMode = null, $lockVersion = null)
 * @method Affaires|null findOneBy(array $criteria, array $orderBy = null)
 * @method Affaires[]    findAll()
 * @method Affaires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffairesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Affaires::class);
    }

    // /**
    //  * @return Affaires[] Returns an array of Affaires objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Affaires
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
