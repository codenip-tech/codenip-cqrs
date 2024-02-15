<?php

declare(strict_types=1);

namespace App\Application\Message;

readonly class CreateExpenseMessage implements MessageInterface
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
