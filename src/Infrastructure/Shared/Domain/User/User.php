<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\Domain\User;


final class User
{
    private $id;
    private $name;
    private $surname;
    private $createdAt;
    private $updatedAt;
    private $active;

    public function __construct(
        UserId $userId,
        UserName $userName,
        ?UserSurname $userSurname,
        UserCreatedAt $userCreatedAt,
        UserUpdatedAt $userUpdatedAt,
        UserActive $userActive
    )
    {
        $this->id        = $userId;
        $this->name      = $userName;
        $this->surname   = $userSurname;
        $this->createdAt = $userCreatedAt;
        $this->updatedAt = $userUpdatedAt;
        $this->active    = $userActive;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function surname(): ?UserSurname
    {
        return $this->surname;
    }

    public function createdAt(): UserCreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UserUpdatedAt
    {
        return $this->updatedAt;
    }

    public function active(): UserActive
    {
        return $this->active;
    }

}