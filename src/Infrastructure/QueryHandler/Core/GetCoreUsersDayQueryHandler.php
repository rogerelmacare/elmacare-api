<?php

declare(strict_types=1);


namespace App\Infrastructure\QueryHandler\Core;


use App\Context\Report\Module\Core\Application\Get\GetCoreUsersDayQuery;
use App\Context\Report\Module\Core\Application\Get\GetCoreUsersDayQueryUseCase;
use App\Infrastructure\Shared\Domain\Core\CoreId;

final class GetCoreUsersDayQueryHandler
{
    private $useCase;

    public function __construct(GetCoreUsersDayQueryUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(GetCoreUsersDayQuery $query): array
    {
        $coreId = new CoreId($query->coreId());

        return $this->useCase->__invoke($coreId);
    }
}