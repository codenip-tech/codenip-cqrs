<?php

declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Document;

#[Document(collection: 'expenses')]
class ExpenseRead
{
    #[ODM\Id]
    private readonly string $id;

    #[ODM\Field(type: 'string')]
    private readonly string $description;

    #[ODM\Field(type: 'integer')]
    private readonly int $amount;

    public function getId(): string
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
