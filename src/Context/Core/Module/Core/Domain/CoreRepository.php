<?php

declare(strict_types=1);

namespace App\Context\Core\Module\Core\Domain;


use App\Infrastructure\Shared\Domain\Core\Core;

interface CoreRepository
{
    public function start(Core $core): void;
}