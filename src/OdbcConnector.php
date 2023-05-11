<?php

namespace Dbt\Odbc;

use Illuminate\Database\Connectors\Connector as IlluminateConnector;
use Illuminate\Database\Connectors\ConnectorInterface;
use Illuminate\Support\Arr;
use PDO;

class OdbcConnector extends IlluminateConnector implements ConnectorInterface
{
    /**
     * @throws \Exception
     */
    public function connect(array $config): PDO
    {
        return $this->createConnection(
            Arr::get($config, 'dsn'),
            $config,
            $this->getOptions($config),
        );
    }
}
