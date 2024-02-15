<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\ExpenseWrite;

interface ExpenseWriteRepository
{
    public function save(ExpenseWrite $expense): void;
}
