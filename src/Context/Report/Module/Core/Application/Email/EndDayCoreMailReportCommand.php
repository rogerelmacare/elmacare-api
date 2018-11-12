<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Application\Email;


final class EndDayCoreMailReportCommand
{
    private $users;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function users(): array
    {
        return $this->users;
    }
}