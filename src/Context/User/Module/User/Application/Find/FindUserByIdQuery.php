<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Find;


final class FindUserByIdQuery
{
    private $userId;

    public function __construct(string $userId)
    {
        $this->userId = $userId;
    }

    public function userId(): string
    {
        return $this->userId;
    }
}