<?php

declare(strict_types=1);

namespace App\Adapter\Symfony\Command;

use App\Application\Command\CommandBusInterface;
use App\Application\Command\CommandInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SymfonyCommandBus implements CommandBusInterface
{
    public function __construct(
        private readonly MessageBusInterface $messageBus,
    ) {}

    public function execute(CommandInterface $command): void
    {
        $this->messageBus->dispatch($command);
    }
}
