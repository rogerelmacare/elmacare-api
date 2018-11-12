<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Email\Application;


final class EmailLoginCommand
{
    private $name;
    private $loginAt;
    private $status;

    public function __construct(string $name, string $loginAt, bool $status)
    {
        $this->name    = $name;
        $this->loginAt = $loginAt;
        $this->status  = $status;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function loginAt(): string
    {
        return $this->loginAt;
    }

    public function status(): bool
    {
        return $this->status;
    }
}