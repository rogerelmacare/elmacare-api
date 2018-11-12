<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\Domain\Login;


use App\Infrastructure\Shared\Domain\Core\CoreId;
use App\Infrastructure\Shared\Domain\User\UserId;

final class Login
{
    private $loginId;
    private $coreId;
    private $userId;
    private $status;
    private $loginAt;


    public function __construct(LoginId $loginId, CoreId $coreId, UserId $userId, LoginStatus $status, LoginAt $loginAt)
    {
        $this->loginId = $loginId;
        $this->coreId  = $coreId;
        $this->userId  = $userId;
        $this->status  = $status;
        $this->loginAt = $loginAt;
    }

    public function loginId(): LoginId
    {
        return $this->loginId;
    }

    public function coreId(): CoreId
    {
        return $this->coreId;
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function status(): LoginStatus
    {
        return $this->status;
    }

    public function loginAt(): LoginAt
    {
        return $this->loginAt;
    }

}