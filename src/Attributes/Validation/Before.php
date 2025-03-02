<?php

namespace Spatie\LaravelData\Attributes\Validation;

use Attribute;
use DateTimeInterface;
use Spatie\LaravelData\Support\Validation\References\RouteParameterReference;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Before extends StringValidationAttribute
{
    public function __construct(protected string | DateTimeInterface|RouteParameterReference $date)
    {
    }

    public static function keyword(): string
    {
        return 'before';
    }

    public function parameters(): array
    {
        return [$this->date];
    }

    public static function create(string ...$parameters): static
    {
        return parent::create(
            self::parseDateValue($parameters[0]),
        );
    }
}
