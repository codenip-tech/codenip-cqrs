<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\ExpenseWrite;
use App\Repository\ExpenseRepository;

class ExpenseService
{
    public function __construct(
        private readonly ExpenseRepository $expenseRepository,
    ) {}

    public function create(string $id, string $description, int $amount): ExpenseWrite
    {
        $expense = new ExpenseWrite($id, $description, $amount);

        $this->expenseRepository->save($expense);

        return $expense;
    }

    public function findById(string $id): ?ExpenseWrite
    {
        return $this->expenseRepository->findById($id);
    }
}
