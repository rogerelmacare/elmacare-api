<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Domain;


use App\Infrastructure\Shared\Domain\Core\CoreId;

interface ReportRepository
{
    public function getCoreUsersDayByCoreId(CoreId $coreId): ?array;
}