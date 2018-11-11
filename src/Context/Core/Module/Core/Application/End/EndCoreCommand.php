<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\End;


final class EndCoreCommand
{
    private $id;
    private $startAt;
    private $endAt;
    private $numberOfLogins;

    public function __construct(string $id, string $startAt, string $endAt, int $numberOfLogins)
    {
        $this->id             = $id;
        $this->startAt        = $startAt;
        $this->endAt          = $endAt;
        $this->numberOfLogins = $numberOfLogins;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function startAt(): string
    {
        return $this->startAt;
    }

    public function endAt(): string
    {
        return $this->endAt;
    }

    public function numberOfLogins(): int
    {
        return $this->numberOfLogins;
    }
}