<?php

declare(strict_types=1);

namespace App\Messenger\MessageHandler;

use App\Entity\ExpenseWrite;
use App\Messenger\Event\ExpenseWasCreatedEvent;
use App\Messenger\Message\CreateExpenseMessage;
use App\Repository\ExpenseWriteRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class CreateExpenseMessageHandler
{
    public function __construct(
        private readonly ExpenseWriteRepository $expenseRepository,
        private readonly MessageBusInterface $bus,
    ) {}

    public function __invoke(CreateExpenseMessage $message): void
    {
        // create expense from message
        $expense = new ExpenseWrite($message->id, $message->description, $message->amount);
        // persist in MySQL database
        $this->expenseRepository->save($expense);
        // domain event ExpenseWasCreated
        $this->bus->dispatch(
            new ExpenseWasCreatedEvent($message->id, $message->description, $message->amount),
        );
    }
}
