<?php

declare(strict_types=1);

namespace App\Adapter\Symfony\Event\EventHandler\Expense;

use App\Application\Event\ExpenseWasCreatedEvent;
use App\Application\UseCase\Expenses\Move\DTO\MoveExpenseInput;
use App\Application\UseCase\Expenses\Move\MoveExpense;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ExpenseWasCreatedEventHandler
{
    public function __construct(
        private readonly MoveExpense $moveExpense,
    ) {}

    public function __invoke(ExpenseWasCreatedEvent $event): void
    {
        $this->moveExpense->execute(
            new MoveExpenseInput($event->id, $event->description, $event->amount),
        );
    }
}
