<?php

namespace App\Repository;

use App\Entity\Colloque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Colloque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Colloque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Colloque[]    findAll()
 * @method Colloque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColloqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Colloque::class);
    }

    // /**
    //  * @return Colloque[] Returns an array of Colloque objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Colloque
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
