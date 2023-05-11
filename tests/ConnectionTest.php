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
}
