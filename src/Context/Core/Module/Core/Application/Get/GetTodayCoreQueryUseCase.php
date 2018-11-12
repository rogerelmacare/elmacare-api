<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\Get;


use App\Context\Core\Module\Core\Domain\CoreRepository;
use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreEndAt;
use App\Infrastructure\Shared\Domain\Core\CoreId;
use App\Infrastructure\Shared\Domain\Core\CoreNumberOfLogins;
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

        $core  = $this->repository->getTodayCore($coreStartAt);
        $endAt = $this->guardEndAt($core['end_at']);

        if ($core) {
            return new Core(
                new CoreId($core['id']),
                new CoreStartAt($core['start_at']),
                new CoreEndAt($endAt),
                new CoreNumberOfLogins((int)$core['number_of_logins'])
            );

        } else {
            return null;
        }
    }

    private function guardEndAt(?string $endAt): string
    {
        return $endAt ?: '';
    }
}