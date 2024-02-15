<?php

declare(strict_types=1);

namespace App\Application\Message;

interface MessageBusInterface
{
    public function dispatch(MessageInterface $message): void;
}
