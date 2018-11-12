<?php

declare(strict_types=1);

namespace App\Context\Core\Module\Core\Application\Start;


interface StartCoreCommandHandlerInterface
{
    public function __invoke(StartCoreCommand $startCoreCommand);
}