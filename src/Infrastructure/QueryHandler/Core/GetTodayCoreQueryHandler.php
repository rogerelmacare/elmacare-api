<?php

declare(strict_types=1);


namespace App\Infrastructure\QueryHandler\Core;


use App\Context\Core\Module\Core\Application\Get\GetTodayCoreQuery;
use App\Context\Core\Module\Core\Application\Get\GetTodayCoreQueryUseCase;
use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreStartAt;

final class GetTodayCoreQueryHandler
{
    private $useCase;

    public function __construct(GetTodayCoreQueryUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(GetTodayCoreQuery $query): Core
    {

        $coreStartAt = new CoreStartAt($query->startAt());

        return $this->useCase->__invoke($coreStartAt);
    }
}