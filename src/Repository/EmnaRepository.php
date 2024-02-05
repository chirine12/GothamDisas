<?php

namespace App\Repository;

use App\Entity\Emna;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Emna>
 *
 * @method Emna|null find($id, $lockMode = null, $lockVersion = null)
 * @method Emna|null findOneBy(array $criteria, array $orderBy = null)
 * @method Emna[]    findAll()
 * @method Emna[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmnaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Emna::class);
    }

//    /**
//     * @return Emna[] Returns an array of Emna objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Emna
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
