<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Expense;
use App\Repository\ExpenseRepository;

class ExpenseService
{
    public function __construct(
        private readonly ExpenseRepository $expenseRepository,
    ) {}

    public function create(string $id, string $description, int $amount): Expense
    {
        $expense = new Expense($id, $description, $amount);

        $this->expenseRepository->save($expense);

        return $expense;
    }

    public function findById(string $id): ?Expense
    {
        return $this->expenseRepository->findById($id);
    }
}
