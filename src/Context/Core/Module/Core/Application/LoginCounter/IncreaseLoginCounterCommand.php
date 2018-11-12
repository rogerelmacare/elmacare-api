<?php

declare(strict_types=1);


namespace App\Context\Core\Module\Core\Application\LoginCounter;


final class IncreaseLoginCounterCommand
{
    private $coreId;

    public function __construct(string $coreId)
    {
        $this->coreId = $coreId;
    }

    public function coreId(): string
    {
        return $this->coreId;
    }

}