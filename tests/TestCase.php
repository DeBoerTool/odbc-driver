<?php

namespace Dbt\Odbc\Tests;

use Dbt\Odbc\Provider;
use Illuminate\Config\Repository;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp (): void
    {
        parent::setUp();

        $config = $this->app->make(Repository::class);

        $config->set('database.connections', [
            'odbc' => [
                'driver'   => 'odbc',
                'dsn'      => env('ODBC_DSN'),
                'host'     => env('ODBC_HOST'),
                'database' => env('ODBC_DB'),
                'username' => env('ODBC_USERNAME'),
                'password' => env('ODBC_PASSWORD'),
            ],
        ]);

        $config->set('database.test_select', env('ODBC_TEST_SELECT'));
    }

    protected function getPackageProviders ($app): array
    {
        return [Provider::class];
    }
}
