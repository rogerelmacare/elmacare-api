<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Find;


use App\Context\User\Module\User\Domain\UserRepository;

final class FindAllUsersQueryUseCase
{
    private $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function __invoke(): array
    {
        return $this->repository->findAll();
    }
}