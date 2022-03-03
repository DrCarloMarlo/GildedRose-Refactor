# GildedRose Kata - PHP Version

## Installation

Required :

- [PHP 7.3 or 7.4 or 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Clone the repository

```sh
git clone git@github.com:DrCarloMarlo/GildedRose-Refactor.git
```

Install composer

```shell script
cd ./dev/GildedRose-Refactor
composer install
```

## Folders

- `src` - contains the worker classes:
    - `Types` - contains typical classes of items
        - `Backstage.php` - class for BackStage items
        - `Brie.php` - class for Brie items
        - `Conjured.php` - class for Conjured items
        - `Legendary.php` - class for Legendary items
        - `Normal.php` - class for Normal items
        - `Types.php` - abstract class for items
    - `Item.php` - immutable item class, goblin will be happy
    - `GildedRose.php` - a class containing a method for handling item counting
    - `Conditions.php` - class containing an array of conditions for selecting a handler
    - `autoload.php` - autoloader for used classes
- `tests` - contains the tests
    - `GildedRoseTest.php` - test, contains DataProvider.
- `Fixture`
    - `test_fixture.php` run from the command line, text output of the 10-day item counting cycle.

## Testing

PHPUnit is configured for testing, a composer script has been provided. To run the unit tests, from the root of the PHP
project run:

```shell script
composer test
```

A Windows a batch file has been created, like an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
PHPUnit `composer test` can be run:

```shell script
pu
```