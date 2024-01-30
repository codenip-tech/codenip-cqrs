<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'expense')]
#[ORM\Entity(repositoryClass: ExpenseRepository::class)]
class ExpenseWrite
{
    #[ORM\Id]
    #[ORM\Column(type: 'string', length: 36)]
    private string $id;

    #[ORM\Column(length: 100)]
    private string $description;

    #[ORM\Column]
    private int $amount;

    public function __construct(string $id, string $description, int $amount)
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

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'amount' => $this->amount,
        ];
    }
}
