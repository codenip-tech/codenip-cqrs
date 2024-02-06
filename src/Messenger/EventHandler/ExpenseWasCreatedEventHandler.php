<?php

declare(strict_types=1);

namespace App\Messenger\EventHandler;

use App\Document\ExpenseRead;
use App\Messenger\Event\ExpenseWasCreatedEvent;
use App\Repository\ExpenseReadRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ExpenseWasCreatedEventHandler
{
    public function __construct(
        private readonly ExpenseReadRepository $expenseReadRepository,
    ) {}

    public function __invoke(ExpenseWasCreatedEvent $event): void
    {
        // create document from event
        $expense = new ExpenseRead($event->id, $event->description, $event->amount);
        // persist in MongoDB collection
        $this->expenseReadRepository->save($expense);
    }
}
