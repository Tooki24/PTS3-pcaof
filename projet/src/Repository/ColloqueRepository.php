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
     * @return Colloque
     */
    public function dateAsc(){
        return $this->createQueryBuilder('c')
            ->orderBy('c.dateD', 'ASC')
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
            ->where('c.onLine = true')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Colloque
     */
    public function lastOne(){
        $colloque = $this->createQueryBuilder('c')
            ->where("c.onLine = true")
            ->orderBy('c.dateD', 'DESC')
            ->setMaxResults(2)
            ->getQuery()
            ->getResult();

        return empty(!$colloque) ? $colloque[0] : null;
    }

    // Requette for EasyAdmin

    /**
     * @return int|mixed|string
     */
    public function countAll(){
        $queryBuilder = $this->createQueryBuilder('c');
        $queryBuilder->select('COUNT(c.id) as value');

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
