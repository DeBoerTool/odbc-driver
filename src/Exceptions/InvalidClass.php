<?php

namespace Dbt\Odbc\Exceptions;

use Exception;

final class InvalidClass extends Exception
{
    public static function doesntExist(string $class, string $in): self
    {
        return new self(
            sprintf('[%s]: Class "%s" does not exist', $in, $class)
        );
    }

    public static function doesntExtend(string $class, string $base, string $in): self
    {
        return new self(
            sprintf('[%s]: Class "%s" must extend "%s"', $in, $class, $base)
        );
    }
}
