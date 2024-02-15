<?php

declare(strict_types=1);

namespace App\Adapter\Framework\Http\Controller\Expenses;

use App\Application\Service\Expense\ExpenseFinderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GetExpenseByIdController extends AbstractController
{
    public function __construct(
        private readonly ExpenseFinderService $expenseService,
    ) {}

    #[Route('/expenses/{id}', name: 'get_expense_by_id', methods: ['GET'])]
    public function get(string $id): Response
    {
        if (null === $expense = $this->expenseService->findById($id)) {
            return $this->json([], Response::HTTP_NOT_FOUND);
        }

        return $this->json($expense->toArray());
    }
}
