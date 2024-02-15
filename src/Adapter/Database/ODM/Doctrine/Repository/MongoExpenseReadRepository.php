<?php

declare(strict_types=1);

namespace App\Adapter\Database\ODM\Doctrine\Repository;

use App\Domain\Entity\ExpenseRead;
use App\Domain\Repository\ExpenseReadRepository;
use Doctrine\Bundle\MongoDBBundle\ManagerRegistry;
use Doctrine\Bundle\MongoDBBundle\Repository\ServiceDocumentRepository;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

/**
 * @extends ServiceDocumentRepository<ExpenseRead>
 *
 * @method ExpenseRead|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseRead|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseRead[]    findAll()
 * @method ExpenseRead[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MongoExpenseReadRepository extends ServiceDocumentRepository implements ExpenseReadRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseRead::class);
    }

    public function findOneById(string $id): ?ExpenseRead
    {
        return $this->find($id);
    }

    /**
     * @throws MongoDBException
     */
    public function save(ExpenseRead $expenseRead): void
    {
        $this->getDocumentManager()->persist($expenseRead);
        $this->getDocumentManager()->flush();
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
