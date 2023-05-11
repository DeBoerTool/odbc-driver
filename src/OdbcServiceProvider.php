<?php

namespace Dbt\Odbc;

use Illuminate\Support\ServiceProvider;

class OdbcServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        OdbcConnection::resolverFor(
            'odbc',
            /**
             * @param \PDO|\Closure $connection
             * @param string $database
             * @param string $prefix
             * @param array $config
             * @return \Dbt\Odbc\OdbcConnection
             * @throws \Exception
             */
            function ($connection, $database, $prefix, $config) {
                if (!isset($config['prefix'])) {
                    $config['prefix'] = '';
                }

                return new OdbcConnection(
                    (new OdbcConnector())->connect($config),
                    $database,
                    $config['prefix'],
                    $config,
                );
            },
        );
    }
}
