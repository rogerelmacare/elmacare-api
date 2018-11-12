<?php

declare(strict_types=1);


namespace App\Infrastructure\CommandHandler\Email;


use App\Context\Login\Module\Email\Application\EmailLoginCommand;
use App\Context\Login\Module\Email\Application\EmailLoginCommandUseCase;
use App\Infrastructure\Shared\Domain\Email\LoginAt;
use App\Infrastructure\Shared\Domain\Email\LoginEmail;
use App\Infrastructure\Shared\Domain\Email\LoginName;
use App\Infrastructure\Shared\Domain\Email\LoginStatus;

final class EmailLoginCommandHandler
{
    private $useCase;

    public function __construct(EmailLoginCommandUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(EmailLoginCommand $command)
    {
        $loginEmail = new LoginEmail(
            new LoginName($command->name()),
            new LoginAt($command->loginAt()),
            new LoginStatus($command->status())
        );

        $this->useCase->__invoke($loginEmail);
    }
}