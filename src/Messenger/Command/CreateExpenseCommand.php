<?php

declare(strict_types=1);

namespace App\Messenger\Command;

readonly class CreateExpenseCommand
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
