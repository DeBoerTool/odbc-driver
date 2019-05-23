<?php

namespace Dbt\Odbc;

class Config
{
    /**
     * Get a value from the config if it's resolvable.
     * @param string $key
     * @return string|null
     */
    public static function get (string $key)
    {
        $value = null;

        if (function_exists('resolve')) {
            $repo = resolve('config');

            if ($repo && method_exists($repo, 'get')) {
                $value = $repo->get($key);
            }
        }

        return $value;
    }
}
