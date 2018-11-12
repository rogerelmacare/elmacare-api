<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Login\Application\Login;


use App\Context\Login\Module\Login\Domain\LoginRepository;
use App\Infrastructure\Shared\Domain\Login\Login;

final class LoginCommandUseCase
{
    private $repository;

    public function __construct(LoginRepository $coreRepository)
    {
        $this->repository = $coreRepository;
    }

    public function __invoke(Login $login): void
    {
        $this->repository->login($login);
    }
}