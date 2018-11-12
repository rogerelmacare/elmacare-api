<?php

declare(strict_types=1);


namespace App\Context\Report\Module\Core\Application\Get;


final class GetCoreUsersDayQuery
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