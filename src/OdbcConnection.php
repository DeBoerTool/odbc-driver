<?php

namespace Dbt\Odbc;

use Dbt\Odbc\Grammar\QueryGrammar;
use Dbt\Odbc\Grammar\SchemaGrammar;
use Illuminate\Database\Connection as IlluminateConnection;
use Illuminate\Database\Grammar as IlluminateQueryGrammar;
use Illuminate\Database\Schema\Grammars\Grammar as IlluminateSchemaGrammar;

class OdbcConnection extends IlluminateConnection
{
    protected function getDefaultQueryGrammar(): IlluminateQueryGrammar
    {
        return isset($this->config['grammar']['query'])
            ? new $this->config['grammar']['query']
            : new QueryGrammar();
    }

    protected function getDefaultSchemaGrammar(): IlluminateSchemaGrammar
    {
        return isset($this->config['grammar']['schema'])
            ? new $this->config['grammar']['schema']
            : new SchemaGrammar();
    }
}
