<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Application\Email;


interface EndDayCoreMailReportCommandHandlerInterface
{
    public function __invoke(EndDayCoreMailReportCommand $endDayCoreMailReportCommand);
}