<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\Get;


use App\Context\Core\Module\Core\Domain\CoreRepository;
use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreStartAt;

final class GetTodayCoreQueryUseCase
{
    private $repository;

    public function __construct(CoreRepository $coreRepository)
    {
        $this->repository = $coreRepository;
    }

    public function __invoke(CoreStartAt $coreStartAt): Core
    {
        return $this->repository->getTodayCore($coreStartAt);
    }
}