<?php

declare(strict_types=1);

namespace App\Messenger\Event;

readonly class ExpenseWasCreatedEvent
{
    public function __construct(
        public string $id,
        public string $description,
        public int $amount,
    ) {}
}
