<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Login\Application\Login;


final class LoginCommand
{
    private $id;
    private $coreId;
    private $userId;
    private $status;
    private $loginAt;


    public function __construct(string $id, string $coreId, string $userId, bool $status, string $loginAt)
    {
        $this->id      = $id;
        $this->coreId  = $coreId;
        $this->userId  = $userId;
        $this->status  = $status;
        $this->loginAt = $loginAt;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function coreId(): string
    {
        return $this->coreId;
    }

    public function userid(): string
    {
        return $this->userId;
    }

    public function status(): bool
    {
        return $this->status;
    }

    public function loginAt(): string
    {
        return $this->loginAt;
    }
}