<?php

namespace Dbt\Odbc\Tests;

use Illuminate\Support\Facades\DB;

class ConnectionTest extends TestCase
{
    /** @test */
    public function getting_the_connection(): void
    {
        $result = DB::connection('odbc')
            ->select(config('database.test_select'));

        $this->assertNotNull($result);
    }

    /** @test */
    public function using_a_different_connection_name(): void
    {
        $config = config()->get('database.connections.odbc');

        config()->set('database.connections.odbc2', $config);

        $this->assertNotNull(
            DB::connection('odbc2')->select(config('database.test_select')),
        );
    }
}
