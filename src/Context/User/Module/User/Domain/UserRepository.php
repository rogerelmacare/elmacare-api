<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Domain;


use App\Infrastructure\Shared\Domain\User\User;
use App\Infrastructure\Shared\Domain\User\UserId;

interface UserRepository
{
    public function create(User $user): void;

    public function findAll(): array;

    public function findById(UserId $userId): ?array;
}