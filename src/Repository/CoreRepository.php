<?php

namespace App\Repository;

use App\Entity\Core;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Core|null find($id, $lockMode = null, $lockVersion = null)
 * @method Core|null findOneBy(array $criteria, array $orderBy = null)
 * @method Core[]    findAll()
 * @method Core[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoreRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Core::class);
    }

    // /**
    //  * @return Core[] Returns an array of Core objects
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
    public function findOneBySomeField($value): ?Core
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
