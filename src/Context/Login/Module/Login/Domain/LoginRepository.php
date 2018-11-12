<?php


namespace App\Context\Login\Module\Login\Domain;


use App\Infrastructure\Shared\Domain\Login\Login;

interface LoginRepository
{
    public function login(Login $login): void;
}