<?php

namespace App\Repository;

use App\Entity\StockSmartphone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StockSmartphone|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockSmartphone|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockSmartphone[]    findAll()
 * @method StockSmartphone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockSmartphoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockSmartphone::class);
    }

    // /**
    //  * @return StockSmartphone[] Returns an array of StockSmartphone objects
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
    public function findOneBySomeField($value): ?StockSmartphone
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
