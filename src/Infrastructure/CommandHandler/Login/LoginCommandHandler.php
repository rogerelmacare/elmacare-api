<?php

declare(strict_types=1);


namespace App\Infrastructure\CommandHandler\Login;


use App\Context\Login\Module\Login\Application\Login\LoginCommand;
use App\Context\Login\Module\Login\Application\Login\LoginCommandUseCase;
use App\Infrastructure\Shared\Domain\Core\CoreId;
use App\Infrastructure\Shared\Domain\Login\Login;
use App\Infrastructure\Shared\Domain\Login\LoginAt;
use App\Infrastructure\Shared\Domain\Login\LoginId;
use App\Infrastructure\Shared\Domain\Login\LoginStatus;
use App\Infrastructure\Shared\Domain\User\UserId;

final class LoginCommandHandler
{
    private $useCase;

    public function __construct(LoginCommandUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(LoginCommand $command)
    {
        $login = new Login(
            new LoginId($command->id()),
            new CoreId($command->coreId()),
            new UserId($command->userid()),
            new LoginStatus($command->status()),
            new LoginAt($command->loginAt())
        );

        $this->useCase->__invoke($login);
    }
}

/*
 *
 *
 *     private $repository;

    public function __construct(LoginRepository $loginRepository)
    {
        $this->repository = $loginRepository;
    }

    public function __invoke(LoginUserCommand $loginUserCommand)
    {
        $login = new Login(
            new LoginId($loginUserCommand->id()),
            new CoreId($loginUserCommand->coreId()),
            new UserId($loginUserCommand->userid()),
            new LoginStatus($loginUserCommand->status()),
            new LoginAt($loginUserCommand->loginAt())
        );

        $this->repository->login($login);
    }
 */