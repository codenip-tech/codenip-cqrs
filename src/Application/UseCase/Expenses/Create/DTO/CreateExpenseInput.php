<?php

declare(strict_types=1);

namespace App\Application\UseCase\Expenses\Create\DTO;

class CreateExpenseInput
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
