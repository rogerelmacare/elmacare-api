<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Domain;


interface ReportGmailRepository
{
    public function send(array $users): void;
}