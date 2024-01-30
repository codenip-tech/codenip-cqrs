<?php

declare(strict_types=1);

namespace App\Messenger\CommandHandler;

use App\Messenger\Command\CreateExpenseCommand;
use App\Messenger\Message\CreateExpenseMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class CreateExpenseCommandHandler
{
    public function __construct(
        private readonly MessageBusInterface $bus,
    ) {}

    public function __invoke(CreateExpenseCommand $command): void
    {
        $this->bus->dispatch(
            new CreateExpenseMessage(
                $command->id,
                $command->description,
                $command->amount,
            ),
        );
    }
}
