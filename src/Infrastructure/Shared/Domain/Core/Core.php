<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\Domain\Core;


final class Core
{
    private $id;
    private $startAt;
    private $endAt;
    private $numberOfLogins;

    public function __construct(CoreId $id, CoreStartAt $startAt, ?CoreEndAt $endAt, ?CoreNumberOfLogins $numberOfLogins)
    {
        $this->id             = $id;
        $this->startAt        = $startAt;
        $this->endAt          = $endAt;
        $this->numberOfLogins = $numberOfLogins;
    }

    public function id(): CoreId
    {
        return $this->id;
    }

    public function startAt(): CoreStartAt
    {
        return $this->startAt;
    }

    public function endAt(): ?CoreEndAt
    {
        return $this->endAt;
    }

    public function numberOfLogins(): ?CoreNumberOfLogins
    {
        return $this->numberOfLogins;
    }

}