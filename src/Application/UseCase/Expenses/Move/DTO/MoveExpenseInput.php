<?php

declare(strict_types=1);

namespace App\Application\UseCase\Expenses\Move\DTO;

class MoveExpenseInput
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
