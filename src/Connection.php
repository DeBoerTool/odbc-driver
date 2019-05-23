<?php

namespace Dbt\Odbc;

use Dbt\Odbc\Exceptions\InvalidClass;
use Dbt\Odbc\Grammar\Query;
use Dbt\Odbc\Grammar\Schema;
use Illuminate\Database\Connection as IlluminateConnection;
use Illuminate\Database\Grammar;

class Connection extends IlluminateConnection
{
    /** @var string */
    private $keyFormat = 'database.connections.odbc.grammar.%s';

    /**
     * @inheritdoc
     * @psalm-suppress MoreSpecificReturnType
     */
    protected function getDefaultQueryGrammar ()
    {
        return $this->withTablePrefix(
            $this->keyOrDefault('query', Query::class)
        );
    }

    /**
     * @inheritdoc
     * @psalm-suppress MoreSpecificReturnType
     */
    protected function getDefaultSchemaGrammar ()
    {
        return $this->withTablePrefix(
            $this->keyOrDefault('sh', Schema::class)
        );
    }

    private function keyOrDefault (string $key, string $fqcn): Grammar
    {
        $class = Config::get(sprintf($this->keyFormat, $key))
            ?: $fqcn;

        if (!class_exists($class)) {
            throw InvalidClass::doesntExist($class, 'ODBC Connector');
        }

        if (!is_subclass_of($class, Grammar::class)) {
            throw InvalidClass::doesntExtend(
                $class,
                Grammar::class,
                'ODBC Connector'
            );
        }

        return new $class;
    }
}
