<?php

declare(strict_types=1);


namespace App\Infrastructure\Shared\Domain\Email;


final class LoginEmail
{
    private $loginName;
    private $loginAt;
    private $loginStatus;

    public function __construct(LoginName $loginName, LoginAt $loginAt, LoginStatus $loginStatus)
    {
        $this->loginName   = $loginName;
        $this->loginAt     = $loginAt;
        $this->loginStatus = $loginStatus;
    }

    public function loginName(): LoginName
    {
        return $this->loginName;
    }

    public function loginAt(): LoginAt
    {
        return $this->loginAt;
    }

    public function loginStatus(): LoginStatus
    {
        return $this->loginStatus;
    }


}