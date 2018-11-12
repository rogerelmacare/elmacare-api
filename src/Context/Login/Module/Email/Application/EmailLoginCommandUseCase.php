<?php

declare(strict_types=1);


namespace App\Context\Login\Module\Email\Application;


use App\Context\Login\Module\Email\Domain\EmailRepository;
use App\Infrastructure\Shared\Domain\Email\LoginEmail;

final class EmailLoginCommandUseCase
{
    private $repository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->repository = $emailRepository;
    }

    public function __invoke(LoginEmail $loginEmail)
    {
        $this->repository->send($loginEmail);
    }
}