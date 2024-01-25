<?php

declare(strict_types=1);

namespace App\Messenger\Handler;

use App\Entity\Expense;
use App\Messenger\Command\CreateExpenseCommand;
use App\Repository\ExpenseRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateExpenseHandler
{
    public function __construct(
        private readonly ExpenseRepository $expenseRepository,
    ) {}

    public function __invoke(CreateExpenseCommand $command): void
    {
        $expense = new Expense($command->id, $command->description, $command->amount);

        $this->expenseRepository->save($expense);
    }
}
