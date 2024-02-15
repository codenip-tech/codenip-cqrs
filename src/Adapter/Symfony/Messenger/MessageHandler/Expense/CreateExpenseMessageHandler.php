<?php

declare(strict_types=1);

namespace App\Adapter\Symfony\Messenger\MessageHandler\Expense;

use App\Application\Message\CreateExpenseMessage;
use App\Application\UseCase\Expenses\Create\CreateExpense;
use App\Application\UseCase\Expenses\Create\DTO\CreateExpenseInput;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateExpenseMessageHandler
{
    public function __construct(
        private readonly CreateExpense $createExpense,
    ) {}

    public function __invoke(CreateExpenseMessage $message): void
    {
        $this->createExpense->execute(
            new CreateExpenseInput($message->id, $message->description, $message->amount),
        );
    }
}
