<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Domain;


use App\Infrastructure\Shared\Domain\User\User;

interface UserRepository
{
    public function create(User $user): void;
}