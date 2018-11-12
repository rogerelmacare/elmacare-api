<?php

declare(strict_types=1);


namespace App\Infrastructure\Shared\Domain\Core;


final class IncreaseLoginCounter
{
    private $coreId;
    private $increaseIn;

    public function __construct(CoreId $core)
    {
        $this->coreId     = $core;
        $this->increaseIn = 1;
    }

    public function coreId(): CoreId
    {
        return $this->coreId;
    }

    public function increaseIn(): int
    {
        return $this->increaseIn;
    }
}