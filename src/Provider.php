<?php

namespace Dbt\Odbc;

use Illuminate\Database\Connection;
use Illuminate\Support\ServiceProvider;

final class Provider extends ServiceProvider
{
	public function boot (): void
	{
		Connection::resolverFor('odbc', Resolver::callback());
	}
}
