<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Email\Domain;


use App\Infrastructure\Shared\Domain\Email\LoginEmail;

interface EmailRepository
{
    public function send(LoginEmail $loginEmail);
}