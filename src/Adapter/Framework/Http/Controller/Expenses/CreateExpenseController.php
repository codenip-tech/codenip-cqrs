<?php

declare(strict_types=1);

namespace App\Adapter\Framework\Http\Controller\Expenses;

use App\Application\Command\CommandBusInterface;
use App\Application\Command\CreateExpenseCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

use function json_decode;

class CreateExpenseController extends AbstractController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
    ) {}

    #[Route('/expenses', name: 'create_expense', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $expenseId = Uuid::v4()->toRfc4122();

        $data = json_decode($request->getContent(), true);

        $description = $data['description'];
        $amount = $data['amount'];

        $command = new CreateExpenseCommand($expenseId, $description, $amount);

        $this->commandBus->execute($command);

        return $this->json(['id' => $expenseId], Response::HTTP_ACCEPTED);
    }
}
