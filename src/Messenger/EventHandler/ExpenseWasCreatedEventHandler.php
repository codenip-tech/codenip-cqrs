<?php

declare(strict_types=1);

namespace App\Messenger\EventHandler;

use App\Messenger\Event\ExpenseWasCreatedEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ExpenseWasCreatedEventHandler
{
    public function __invoke(ExpenseWasCreatedEvent $event): void
    {
        // create document from event

        // persist in MongoDB collection
    }
}
