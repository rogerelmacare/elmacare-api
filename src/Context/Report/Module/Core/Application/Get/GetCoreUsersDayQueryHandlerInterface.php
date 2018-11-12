<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Application\Get;


interface GetCoreUsersDayQueryHandlerInterface
{
    public function __invoke(GetCoreUsersDayQuery $getCoreUsersDayQuery);
}