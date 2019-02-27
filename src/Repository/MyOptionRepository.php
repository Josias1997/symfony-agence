<?php

namespace App\Repository;

use App\Entity\MyOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MyOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method MyOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method MyOption[]    findAll()
 * @method MyOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MyOptionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MyOption::class);
    }

    // /**
    //  * @return MyOption[] Returns an array of MyOption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MyOption
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
