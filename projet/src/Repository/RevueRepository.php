<?php

namespace App\Repository;

use App\Entity\Revue;
use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Revue|null find($id, $lockMode = null, $lockVersion = null)
 * @method Revue|null findOneBy(array $criteria, array $orderBy = null)
 * @method Revue[]    findAll()
 * @method Revue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RevueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Revue::class);
    }


 /**
  * @return Revue
  */
    public function lastOne(){
        $revue = $this->createQueryBuilder('r')
            ->orderBy('r.datePubli', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return empty(!$revue) ? $revue[0] : null;

    }
}
