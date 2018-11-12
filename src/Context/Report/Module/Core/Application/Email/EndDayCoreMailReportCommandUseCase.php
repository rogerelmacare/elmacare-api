<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Application\Email;


use App\Context\Report\Module\Core\Domain\ReportGmailRepository;

final class EndDayCoreMailReportCommandUseCase
{

    private $repository;

    public function __construct(ReportGmailRepository $reportGmailRepository)
    {
        $this->repository = $reportGmailRepository;
    }

    public function __invoke(array $users): void
    {
        $this->repository->send($users);
    }
}