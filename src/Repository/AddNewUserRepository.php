<?php

namespace App\Repository;

use App\Entity\AddNewUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AddNewUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddNewUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddNewUser[]    findAll()
 * @method AddNewUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddNewUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddNewUser::class);
    }

    // /**
    //  * @return AddNewUser[] Returns an array of AddNewUser objects
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
    public function findOneBySomeField($value): ?AddNewUser
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
