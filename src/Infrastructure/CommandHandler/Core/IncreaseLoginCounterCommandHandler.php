<?php

declare(strict_types=1);


namespace App\Infrastructure\CommandHandler\Core;


use App\Context\Core\Module\Core\Application\LoginCounter\IncreaseLoginCounterCommand;
use App\Context\Core\Module\Core\Application\LoginCounter\IncreaseLoginCounterCommandUseCase;
use App\Infrastructure\Shared\Domain\Core\CoreId;
use App\Infrastructure\Shared\Domain\Core\IncreaseLoginCounter;

final class IncreaseLoginCounterCommandHandler
{
    private $useCase;

    public function __construct(IncreaseLoginCounterCommandUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(IncreaseLoginCounterCommand $command): void
    {
        $increaseLoginCounter = new IncreaseLoginCounter(new CoreId($command->coreId()));

        $this->useCase->__invoke($increaseLoginCounter);

    }
}