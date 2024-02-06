<?php

declare(strict_types=1);

namespace App\Messenger\Message;

readonly class CreateExpenseMessage
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
