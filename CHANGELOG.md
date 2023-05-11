# 3.0.0 - 2023-05-11

## Added
- CI with GitHub Actions. The test runner spins up a MS SQL Server instance and connects to it there to verify that the driver actually works.
- Pint and configuration.

## Removed
- A bunch of superfluous code, function checks, etc. Simplified the driver to absolute essentials.
- Psalm and configuration.

## Fixed
- Issue where the driver would not read grammars on connections not named "odbc".
