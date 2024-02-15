<?php

declare(strict_types=1);

namespace App\Adapter\Symfony\Command\CommandHandler\Expense;

use App\Application\Command\CreateExpenseCommand;
use App\Application\Queue\Expense\ExpenseQueueDispatcher;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateExpenseCommandHandler
{
    public function __construct(
        private readonly ExpenseQueueDispatcher $expenseQueueDispatcher,
    ) {}

    public function __invoke(CreateExpenseCommand $command): void
    {
        $this->expenseQueueDispatcher->execute($command);
    }
}
