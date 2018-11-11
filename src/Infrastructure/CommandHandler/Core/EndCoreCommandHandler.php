<?php

declare(strict_types=1);

namespace App\Infrastructure\CommandHandler\Core;


use App\Context\Core\Module\Core\Application\End\EndCoreCommand;
use App\Context\Core\Module\Core\Application\End\EndCoreCommandUseCase;
use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreEndAt;
use App\Infrastructure\Shared\Domain\Core\CoreId;
use App\Infrastructure\Shared\Domain\Core\CoreNumberOfLogins;
use App\Infrastructure\Shared\Domain\Core\CoreStartAt;

final class EndCoreCommandHandler
{
    private $useCase;

    public function __construct(EndCoreCommandUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function __invoke(EndCoreCommand $command): void
    {
        $core = new Core(
            new CoreId($command->id()),
            new CoreStartAt($command->startAt()),
            new CoreEndAt($command->endAt()),
            new CoreNumberOfLogins($command->numberOfLogins())
        );

        $this->useCase->__invoke($core);

    }
}