<?php

namespace Dbt\Odbc;

use Illuminate\Database\Connectors\Connector as IlluminateConnector;
use Illuminate\Database\Connectors\ConnectorInterface;
use Illuminate\Support\Arr;

class Connector extends IlluminateConnector implements ConnectorInterface
{
	public function connect (array $config)
	{
		return $this->createConnection(
            Arr::get($config, 'dsn'),
            $config,
            $this->getOptions($config)
        );
	}
}
