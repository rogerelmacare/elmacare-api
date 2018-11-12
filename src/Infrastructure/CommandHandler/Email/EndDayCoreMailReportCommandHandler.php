<?php

declare(strict_types=1);


namespace App\Infrastructure\CommandHandler\Email;


use App\Context\Report\Module\Core\Application\Email\EndDayCoreMailReportCommand;
use App\Context\Report\Module\Core\Application\Email\EndDayCoreMailReportCommandUseCase;

final class EndDayCoreMailReportCommandHandler
{
    private $useCase;

    public function __construct(EndDayCoreMailReportCommandUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(EndDayCoreMailReportCommand $command)
    {
        $users = $command->users();

        $this->useCase->__invoke($users);
    }
}