<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\ExpenseWrite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExpenseWrite>
 *
 * @method ExpenseWrite|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseWrite|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseWrite[]    findAll()
 * @method ExpenseWrite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseWriteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseWrite::class);
    }

    public function save(ExpenseWrite $expense): void
    {
        $this->_em->persist($expense);
        $this->_em->flush();
    }

    public function findById(string $id): ?ExpenseWrite
    {
        return $this->find($id);
    }
}
