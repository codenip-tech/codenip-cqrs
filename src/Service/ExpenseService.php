<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\ExpenseWrite;
use App\Repository\ExpenseReadRepository;

class ExpenseService
{
    public function __construct(
        private readonly ExpenseReadRepository $expenseReadRepository,
    ) {}

    public function create(string $id, string $description, int $amount): ExpenseWrite
    {
        $expense = new ExpenseWrite($id, $description, $amount);

        $this->expenseReadRepository->save($expense);

        return $expense;
    }

    public function findById(string $id): ?ExpenseWrite
    {
        return $this->expenseReadRepository->findOneById($id);
    }
}
