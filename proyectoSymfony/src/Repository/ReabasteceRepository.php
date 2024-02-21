<?php

namespace App\Repository;

use App\Entity\Reabastece;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Restaurantes>
 *
 * @method Restaurantes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restaurantes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restaurantes[]    findAll()
 * @method Restaurantes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReabasteceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reabastece::class);
    }

//    /**
//     * @return Restaurantes[] Returns an array of Restaurantes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Restaurantes
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
