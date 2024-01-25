<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ExpenseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

use function json_decode;

class ExpensesController extends AbstractController
{
    public function __construct(
        private readonly ExpenseService $expenseService,
    ) {}

    #[Route('/expenses', name: 'create_expense', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $expenseId = Uuid::v4()->toRfc4122();

        $data = json_decode($request->getContent(), true);

        $description = $data['description'];
        $amount = $data['amount'];

        $expense = $this->expenseService->create($expenseId, $description, $amount);

        return $this->json($expense->toArray(), Response::HTTP_CREATED);
    }

    #[Route('/expenses/{id}', name: 'get_expense_by_id', methods: ['GET'])]
    public function get(string $id): Response
    {
        if (null === $expense = $this->expenseService->findById($id)) {
            return $this->json([], Response::HTTP_NOT_FOUND);
        }

        return $this->json($expense->toArray());
    }
}
