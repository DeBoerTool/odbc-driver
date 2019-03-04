<?php

namespace Dbt\Odbc;

use Closure;

final class Resolver
{
    public static function callback (): Closure
    {
        /**
         * @param \PDO|\Closure $connection
         * @param string $database
         * @param string $prefix
         * @param array $config
         * @return \Dbt\Odbc\Connection
         * @psalm-suppress MissingClosureParamType
         * @psalm-suppress  MissingClosureReturnType
         */
        return function ($connection, $database, $prefix, $config)
        {
            if (!isset($config['prefix'])) {
                $config['prefix'] = '';
            }

            return new Connection(
                (new Connector())->connect($config),
                $database,
                $config['prefix'],
                $config
            );
        };
    }
}
