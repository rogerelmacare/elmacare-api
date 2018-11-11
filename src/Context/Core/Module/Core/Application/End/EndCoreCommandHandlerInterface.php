<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\End;


interface EndCoreCommandHandlerInterface
{
    public function __invoke(EndCoreCommand $endCoreCommand);
}