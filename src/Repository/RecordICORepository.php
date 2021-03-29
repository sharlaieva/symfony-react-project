<?php

namespace App\Repository;

use App\Entity\RecordICO;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecordICO|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecordICO|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecordICO[]    findAll()
 * @method RecordICO[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecordICORepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecordICO::class);
    }

    // /**
    //  * @return RecordICO[] Returns an array of RecordICO objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecordICO
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
