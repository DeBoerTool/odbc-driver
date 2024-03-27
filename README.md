# ODBC Driver for Laravel

A simple ODBC driver for Laravel.

### Prerequisites

Enable the `pdo_odbc` [PHP extension](https://www.php.net/manual/en/ref.pdo-odbc.php).


For other database engines (for instance [MS SQL Server](https://learn.microsoft.com/en-us/sql/connect/odbc/linux-mac/installing-the-microsoft-odbc-driver-for-sql-server)), you'll need to install the appropriate PHP extension(s).

### Installation

```
composer require dbt/odbc-driver
```

Laravel will automatically discover the service provider.

### Configuration

In your `database.php` config, configure your connection using the `odbc` driver:

```php
'my-odbc-connection' => [
    'driver'   => 'odbc',
    'dsn'      => env('ODBC_DSN'),
    'host'     => env('ODBC_HOST'),
    'database' => env('ODBC_DB'),
    'username' => env('ODBC_USERNAME'),
    'password' => env('ODBC_PASSWORD'),
],
```

### Custom Grammar

To use SQL Server or other database engines, you can set the grammars in your `database.php` config block for that connection:

```php
'my-odbc-connection' => [
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

For SQL server, you'll need to specify the DSN, the user, and the password. For example:

```php
'dsn' => 'sqlsrv:Driver=ODBC Driver 18 for SQL Server;Server=tcp:localhost,1433;TrustServerCertificate=1;Encrypt=1;'
'username' => 'sa',
'password' => 'my-super-secret-password',
```

### Contributions & License

Contributions are welcome.

MIT Licensed. Do as you wish.
