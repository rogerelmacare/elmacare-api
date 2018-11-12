<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Email\Application;


interface EmailLoginCommandHandlerInterface
{
    public function __invoke(EmailLoginCommand $emailLoginCommand);
}