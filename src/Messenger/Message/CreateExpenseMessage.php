<?php

declare(strict_types=1);

namespace App\Messenger\Message;

class CreateExpenseMessage
{
    public function __construct(
        public readonly string $id,
        public readonly string $description,
        public readonly int $amount,
    ) {}
}
