<?php

namespace App\Repository;

use App\Entity\DataOak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DataOak|null find($id, $lockMode = null, $lockVersion = null)
 * @method DataOak|null findOneBy(array $criteria, array $orderBy = null)
 * @method DataOak[]    findAll()
 * @method DataOak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DataOakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DataOak::class);
    }

    // /**
    //  * @return DataOak[] Returns an array of DataOak objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DataOak
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
