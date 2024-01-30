<?php

declare(strict_types=1);

namespace App\Repository\App\Document;

use App\Entity\App\Document\ExpenseRead;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpenseRead>
 *
 * @method ExpenseRead|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseRead|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseRead[]    findAll()
 * @method ExpenseRead[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseReadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseRead::class);
    }

    //    /**
    //     * @return ExpenseRead[] Returns an array of ExpenseRead objects
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

    //    public function findOneBySomeField($value): ?ExpenseRead
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
