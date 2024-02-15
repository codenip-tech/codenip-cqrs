<?php

declare(strict_types=1);

namespace App\Application\UseCase\Expenses\Create;

use App\Application\Event\EventDispatcherInterface;
use App\Application\Event\ExpenseWasCreatedEvent;
use App\Application\UseCase\Expenses\Create\DTO\CreateExpenseInput;
use App\Domain\Entity\ExpenseWrite;
use App\Domain\Repository\ExpenseWriteRepository;

readonly class CreateExpense
{
    public function __construct(
        private ExpenseWriteRepository $expenseWriteRepository,
        private EventDispatcherInterface $eventDispatcher,
    ) {}

    public function execute(CreateExpenseInput $input): void
    {
        $expense = new ExpenseWrite($input->id, $input->description, $input->amount);

        $this->expenseWriteRepository->save($expense);

        $this->eventDispatcher->dispatch(
            new ExpenseWasCreatedEvent($input->id, $input->description, $input->amount),
        );
    }
}
