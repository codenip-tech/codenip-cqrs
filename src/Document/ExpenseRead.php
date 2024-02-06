<?php

declare(strict_types=1);

namespace App\Document;

use App\Repository\ExpenseReadRepository;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Document;

#[Document(collection: 'expenses', repositoryClass: ExpenseReadRepository::class)]
class ExpenseRead
{
    #[ODM\Id(type: 'string', strategy: 'NONE')]
    private readonly string $id;

    #[ODM\Field(type: 'string')]
    private readonly string $description;

    #[ODM\Field(type: 'int')]
    private readonly int $amount;

    public function __construct(string $id, $description, $amount)
    {
        $this->id = $id;
        $this->description = $description;
        $this->amount = $amount;
    }

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
