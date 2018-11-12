<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Create;


final class CreateUserCommand
{
    private $id;
    private $name;
    private $surname;
    private $createdAt;
    private $updatedAt;
    private $active;

    public function __construct(
        string $id,
        string $name,
        ?string $surname,
        string $createdAt,
        string $updatedAt,
        bool $active
    )
    {
        $this->id        = $id;
        $this->name      = $name;
        $this->surname   = $surname;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->active    = $active;
    }


    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function surname(): ?string
    {
        return $this->surname;
    }

    public function createdAt(): string
    {
        return $this->createdAt;
    }

    public function updatedAt(): string
    {
        return $this->updatedAt;
    }

    public function active(): bool
    {
        return $this->active;
    }
}