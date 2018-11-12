<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Create;


use App\Context\User\Module\User\Domain\UserRepository;

final class CreateUserCommandUseCase
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(User $user)
    {
        $this->repository->create($user);
    }
}