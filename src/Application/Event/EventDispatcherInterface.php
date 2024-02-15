<?php

declare(strict_types=1);

namespace App\Application\Event;

interface EventDispatcherInterface
{
    public function dispatch(EventInterface $event): void;
}
