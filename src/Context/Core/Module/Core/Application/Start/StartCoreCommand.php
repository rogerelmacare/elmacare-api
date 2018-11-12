<?php

declare(strict_types=1);

namespace App\Context\Core\Module\Core\Application\Start;


final class StartCoreCommand
{
    private $id;
    private $startAt;

    public function __construct(string $id, string $startAt)
    {
        $this->id      = $id;
        $this->startAt = $startAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function startAt(): string
    {
        return $this->startAt;
    }
}