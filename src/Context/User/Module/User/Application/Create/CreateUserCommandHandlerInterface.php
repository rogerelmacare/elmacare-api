<?php

declare(strict_types=1);


namespace App\Context\User\Module\User\Application\Create;


interface CreateUserCommandHandlerInterface
{
    public function __invoke(CreateUserCommand $createUserCommand);
}