<?php

namespace App\Repository;

use App\Entity\CoreLogins;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CoreLogins|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoreLogins|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoreLogins[]    findAll()
 * @method CoreLogins[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoreLoginsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CoreLogins::class);
    }

    // /**
    //  * @return CoreLogins[] Returns an array of CoreLogins objects
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
    public function findOneBySomeField($value): ?CoreLogins
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
