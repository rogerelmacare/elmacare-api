<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\LoginCounter;


use App\Context\Core\Module\Core\Domain\CoreRepository;
use App\Infrastructure\Shared\Domain\Core\IncreaseLoginCounter;

final class IncreaseLoginCounterCommandUseCase
{
    private $repository;

    public function __construct(CoreRepository $coreRepository)
    {
        $this->repository = $coreRepository;
    }

    public function __invoke(IncreaseLoginCounter $increaseLoginCounter): void
    {
        $this->repository->increaseLoginCounter($increaseLoginCounter);
    }
}