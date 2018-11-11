<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\Get;


final class GetTodayCoreQuery
{
    private $startAt;

    public function __construct(string $startAt)
    {
        $this->startAt = $startAt;
    }

    public function startAt(): string
    {
        return $this->startAt;
    }
}