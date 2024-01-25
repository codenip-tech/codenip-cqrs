<?php

declare(strict_types=1);

namespace App\Messenger\Command;

class CreateExpenseCommand
{
    public function __construct(
        public readonly string $id,
        public readonly string $description,
        public readonly int $amount,
    ) {}
}
