<?php

declare(strict_types=1);

namespace App\Application\UseCase\Expenses\Move;

use App\Application\UseCase\Expenses\Move\DTO\MoveExpenseInput;
use App\Domain\Entity\ExpenseRead;
use App\Domain\Repository\ExpenseReadRepository;

readonly class MoveExpense
{
    public function __construct(
        private ExpenseReadRepository $expenseReadRepository,
    ) {}

    public function execute(MoveExpenseInput $input): void
    {
        $this->expenseReadRepository->save(
            new ExpenseRead($input->id, $input->description, $input->amount),
        );
    }
}
