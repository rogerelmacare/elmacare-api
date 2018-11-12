<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    private $value;

    public function __construct(string $value)
    {
        $this->guard($value);

        $this->value = $value;
    }

    private function guard($id): void
    {
        if (!RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, is_scalar($id) ? $id : gettype($id))
            );
        }
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function value(): string
    {
        return $this->value;
    }
}