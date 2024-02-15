<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\ExpenseRead;

interface ExpenseReadRepository
{
    public function findOneById(string $id): ?ExpenseRead;

    public function save(ExpenseRead $expenseRead): void;
}
