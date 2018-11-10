<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\ValueObject;


abstract class BooleanValueObject
{

    private const NUMBER_FALSE = 0;
    private const NUMBER_TRUE  = 1;

    protected $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function toNumber(): int
    {
        return $this->value ? self::NUMBER_TRUE : self::NUMBER_FALSE;
    }
}
