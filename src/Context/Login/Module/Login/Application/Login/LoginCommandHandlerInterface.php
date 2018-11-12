<?php

declare(strict_types=1);

namespace App\Context\Login\Module\Login\Application\Login;


interface LoginCommandHandlerInterface
{
    public function __invoke(LoginCommand $loginCommand);
}