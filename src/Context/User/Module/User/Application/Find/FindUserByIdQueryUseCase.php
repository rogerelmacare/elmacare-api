<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Find;


use App\Context\User\Module\User\Domain\UserRepository;
use App\Infrastructure\Shared\Domain\User\User;
use App\Infrastructure\Shared\Domain\User\UserActive;
use App\Infrastructure\Shared\Domain\User\UserCreatedAt;
use App\Infrastructure\Shared\Domain\User\UserId;
use App\Infrastructure\Shared\Domain\User\UserName;
use App\Infrastructure\Shared\Domain\User\UserSurname;
use App\Infrastructure\Shared\Domain\User\UserUpdatedAt;

final class FindUserByIdQueryUseCase
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(UserId $userId): ?User
    {

        $user = $this->repository->findById($userId);

        if ($user) {
            $surname = $this->surnameGuard($user['surname']);

            return new User(
                new UserId($user['id']),
                new UserName($user['name']),
                new UserSurname($surname),
                new UserCreatedAt($user['created_at']),
                new UserUpdatedAt($user['updated_at']),
                new UserActive((bool)$user['active'])
            );
        } else {
            return null;
        }

    }

    private function surnameGuard(?string $surname): string
    {
        return $surname ?: '';
    }
}