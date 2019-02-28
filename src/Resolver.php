<?php

namespace Dbt\LaravelOdbcDriver;

final class Resolver
{
    public static function callback ()
    {
        return function ($connection, $database, $prefix, $config) {
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
