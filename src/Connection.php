<?php

namespace Dbt\LaravelOdbcDriver;

use Dbt\LaravelOdbcDriver\Grammar\Query;
use Dbt\LaravelOdbcDriver\Grammar\Schema;
use Illuminate\Database\Connection as IlluminateConnection;
use Illuminate\Support\Facades\Config;

class Connection extends IlluminateConnection
{
    private $keyFormat = 'database.connections.odbc.grammar.%s';

    protected function getDefaultQueryGrammar ()
    {
        return $this->withTablePrefix(
            $this->keyOrDefault('query', Query::class)
        );
    }

    protected function getDefaultSchemaGrammar ()
    {
        return $this->withTablePrefix(
            $this->keyOrDefault('sh', Schema::class)
        );
    }

    private function keyOrDefault (string $key, string $fqcn)
    {
        $class = Config::get(sprintf($this->keyFormat, $key))
            ?: $fqcn;

        return new $class;
    }
}
