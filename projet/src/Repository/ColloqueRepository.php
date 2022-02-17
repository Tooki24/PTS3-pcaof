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

    /**
     * @return Colloque[]
     */
    public function dateAsc(){
        return $this->createQueryBuilder('c')
            ->orderBy('c.datePubli', 'ASC')
            ->where('c.onLine = true')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Colloque[]
     */
    public function dateDesc()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.dateD', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
