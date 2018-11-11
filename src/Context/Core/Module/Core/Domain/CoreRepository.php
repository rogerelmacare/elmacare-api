<?php

declare(strict_types=1);

namespace App\Context\Core\Module\Core\Domain;


use App\Infrastructure\Shared\Domain\Core\Core;
use App\Infrastructure\Shared\Domain\Core\CoreStartAt;

interface CoreRepository
{
    public function start(Core $core): void;

    public function end(Core $core): void;

    public function getTodayCore(CoreStartAt $coreStartAt): Core;
}