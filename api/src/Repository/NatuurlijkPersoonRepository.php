<?php

namespace App\Repository;

use App\Entity\NatuurlijkPersoon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NatuurlijkPersoon|null find($id, $lockMode = null, $lockVersion = null)
 * @method NatuurlijkPersoon|null findOneBy(array $criteria, array $orderBy = null)
 * @method NatuurlijkPersoon[]    findAll()
 * @method NatuurlijkPersoon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NatuurlijkPersoonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NatuurlijkPersoon::class);
    }

    // /**
    //  * @return NatuurlijkPersoon[] Returns an array of NatuurlijkPersoon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NatuurlijkPersoon
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
