<?php

namespace App\Repository;

use App\Entity\Publication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Publication|null find($id, $lockMode = null, $lockVersion = null)
 * @method Publication|null findOneBy(array $criteria, array $orderBy = null)
 * @method Publication[]    findAll()
 * @method Publication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PublicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Publication::class);
    }

    //Methods qui retourne les 3 dernière publication

    /**
     * @return Publication[]
     */
    public function lastTree(){
        return $this->createQueryBuilder('p')
                    ->where("p.onLine = true")
                    ->orderBy('p.datePubli', 'DESC')
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult();
    }

    /**
     * @return Publication[]
     */
    public function dateDesc(){
        return $this->createQueryBuilder('p')
            ->where("p.onLine = true")
            ->orderBy('p.datePubli', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
