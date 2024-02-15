<?php

declare(strict_types=1);

namespace App\Application\Command;

readonly class CreateExpenseCommand implements CommandInterface
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
