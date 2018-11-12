<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\LoginCounter;


interface IncreaseLoginCounterCommandHandlerInterface
{
    public function __invoke(IncreaseLoginCounterCommand $increaseLoginCounterCommand);
}