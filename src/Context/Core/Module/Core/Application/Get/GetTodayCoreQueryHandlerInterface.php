<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\Get;


interface GetTodayCoreQueryHandlerInterface
{
    public function __invoke(GetTodayCoreQuery $getTodayCoreQuery);
}