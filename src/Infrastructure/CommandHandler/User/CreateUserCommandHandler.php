<?php

declare(strict_types=1);


namespace App\Infrastructure\CommandHandler\User;


use App\Context\User\Module\User\Application\Create\CreateUserCommand;
use App\Context\User\Module\User\Domain\UserRepository;
use App\Infrastructure\Shared\Domain\User\User;
use App\Infrastructure\Shared\Domain\User\UserActive;
use App\Infrastructure\Shared\Domain\User\UserCreatedAt;
use App\Infrastructure\Shared\Domain\User\UserId;
use App\Infrastructure\Shared\Domain\User\UserName;
use App\Infrastructure\Shared\Domain\User\UserSurname;
use App\Infrastructure\Shared\Domain\User\UserUpdatedAt;

final class CreateUserCommandHandler
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(CreateUserCommand $createUserCommand)
    {
        $userSurname = $this->surnameGuard($createUserCommand->surname());

        $user = new User(
            new UserId($createUserCommand->id()),
            new UserName($createUserCommand->name()),
            new UserSurname($userSurname),
            new UserCreatedAt($createUserCommand->createdAt()),
            new UserUpdatedAt($createUserCommand->updatedAt()),
            new UserActive($createUserCommand->active())
        );

        $this->repository->create($user);
    }

    private function surnameGuard(?string $surname): string
    {
        return $surname ?: '';
    }
}