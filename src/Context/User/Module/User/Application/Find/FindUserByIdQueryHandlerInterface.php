<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Find;


interface FindUserByIdQueryHandlerInterface
{
    public function __invoke(FindUserByIdQuery $findUserByIdQuery);
}