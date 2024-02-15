<?php

declare(strict_types=1);

namespace App\Application\Service\Expense;

use App\Domain\Entity\ExpenseRead;
use App\Domain\Repository\ExpenseReadRepository;

class ExpenseFinderService
{
    public function __construct(
        private readonly ExpenseReadRepository $expenseReadRepository,
    ) {}

    public function findById(string $id): ?ExpenseRead
    {
        return $this->expenseReadRepository->findOneById($id);
    }
}
