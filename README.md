# ODBC Driver for Laravel

A simple ODBC driver for Laravel 5.5+.

### Prerequisites

Enable the `pdo_odbc` [PHP extension](https://www.php.net/manual/en/ref.pdo-odbc.php)

### Installation

```
composer require dbt/odbc-driver
```

Laravel will automatically discover the service provider.

### Configuration

In your `database.php` config, you'll need to add the ODBC connection configuration, eg:

```
'odbc' => [
    'driver'   => 'odbc',
    'dsn'      => env('ODBC_DSN'),
    'host'     => env('ODBC_HOST'),
    'database' => env('ODBC_DB'),
    'username' => env('ODBC_USERNAME'),
    'password' => env('ODBC_PASSWORD'),
],
```

### Custom Grammar

To use SQL Server or other database engines, set the grammar in the config:

```
'odbc'   => [
    ...,
    'grammar' => [
        'query' => Illuminate\Database\Query\Grammars\SqlServerGrammar::class,
        'schema' => Illuminate\Database\Schema\Grammars\SqlServerGrammar::class,
    ],
],
```

### Usage

Use the connection like any other, via the query builder or with Eloquent.

For Eloquent, you'll need to specify the model's connection:

```
class Users extends Eloquent {
    /** @var string */
    protected $connection = 'odbc';
}
```

### Connection String 

You may need to use some trial and error to figure out what your connection string should look like. Consult your vendor's database documentation.

It could be a connection path:

```php
'dsn' => 'odbc:\\\\path\to\my\database',
```

Or a connection name:

```php
'dsn' => 'odbc:\\\\my-connection-name',
```

Or something as simple as:

```php
'dsn' => 'odbc:dbname',
```

### Contributions & License

Contributions are welcome.

MIT Licensed. Do as you wish.
