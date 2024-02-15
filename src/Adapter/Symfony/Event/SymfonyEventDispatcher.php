<?php

declare(strict_types=1);

namespace App\Adapter\Symfony\Event;

use App\Application\Event\EventDispatcherInterface;
use App\Application\Event\EventInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class SymfonyEventDispatcher implements EventDispatcherInterface
{
    public function __construct(
        private readonly MessageBusInterface $messageBus,
    ) {}

    public function dispatch(EventInterface $event): void
    {
        $this->messageBus->dispatch($event);
    }
}
