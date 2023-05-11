<?php /** @noinspection PhpUnhandledExceptionInspection */

namespace Dbt\Odbc\Tests;

use Illuminate\Database\Query\Grammars\SqlServerGrammar as SqlServerQueryGrammar;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar as SqlServerSchemaGrammar;
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

    /** @test */
    public function using_a_different_grammar(): void
    {
        config()->set('database.connections.odbc.grammar', [
            'query' => SqlServerQueryGrammar::class,
            'schema' => SqlServerSchemaGrammar::class,
        ]);

        $conn = DB::connection('odbc');

        $this->assertInstanceOf(
            SqlServerQueryGrammar::class,
            $conn->getQueryGrammar(),
        );

        // The default schema grammar isn't set until the schema builder has
        // been instantiated, which we do here by calling getSchemaBuilder().
        $conn->getSchemaBuilder();

        $this->assertInstanceOf(
            SqlServerSchemaGrammar::class,
            $conn->getSchemaGrammar(),
        );

        $this->assertNotNull(
            DB::connection('odbc')->select(config('database.test_select')),
        );
    }
}
