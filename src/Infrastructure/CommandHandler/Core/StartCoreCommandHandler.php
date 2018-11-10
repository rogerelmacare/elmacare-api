<?php

declare(strict_types=1);

namespace App\Infrastructure\CommandHandler\Core;


use App\Context\Core\Module\Core\Application\Start\StartCoreCommand;
use App\Context\Core\Module\Core\Application\Start\StartCoreCommandUseCase;
use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreEndAt;
use App\Infrastructure\Shared\Domain\Core\CoreId;
use App\Infrastructure\Shared\Domain\Core\CoreNumberOfLogins;
use App\Infrastructure\Shared\Domain\Core\CoreStartAt;

final class StartCoreCommandHandler
{
    private $useCase;

    public function __construct(StartCoreCommandUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(StartCoreCommand $command)
    {
        $core = new Core(
            new CoreId($command->id()),
            new CoreStartAt($command->startAt()),
            new CoreEndAt(''),
            new CoreNumberOfLogins(0)
        );

        $this->useCase->__invoke($core);

    }
}