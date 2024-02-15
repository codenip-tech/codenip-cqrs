<?php

declare(strict_types=1);

namespace App\Adapter\Symfony\Messenger;

use App\Application\Message\MessageBusInterface;
use App\Application\Message\MessageInterface;
use Symfony\Component\Messenger\MessageBusInterface as SymfonyMessageBusInterface;

class SymfonyMessageBus implements MessageBusInterface
{
    public function __construct(
        private readonly SymfonyMessageBusInterface $symfonyMessageBus,
    ) {}

    public function dispatch(MessageInterface $message): void
    {
        $this->symfonyMessageBus->dispatch($message);
    }
}
