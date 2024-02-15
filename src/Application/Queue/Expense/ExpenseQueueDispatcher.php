<?php

declare(strict_types=1);

namespace App\Application\Queue\Expense;

use App\Application\Command\CreateExpenseCommand;
use App\Application\Message\CreateExpenseMessage;
use App\Application\Message\MessageBusInterface;

class ExpenseQueueDispatcher
{
    public function __construct(
        private readonly MessageBusInterface $messageBus,
    ) {}

    public function execute(CreateExpenseCommand $command): void
    {
        $this->messageBus->dispatch(
            new CreateExpenseMessage(
                $command->id,
                $command->description,
                $command->amount,
            ),
        );
    }
}
