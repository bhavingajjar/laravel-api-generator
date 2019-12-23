# Description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bhavingajjar/laravel-api-generator.svg?style=flat-square)](https://packagist.org/packages/bhavingajjar/laravel-api-generator)
[![Build Status](https://img.shields.io/travis/bhavingajjar/laravel-api-generator/master.svg?style=flat-square)](https://travis-ci.org/bhavingajjar/laravel-api-generator)
[![Quality Score](https://img.shields.io/scrutinizer/g/bhavingajjar/laravel-api-generator.svg?style=flat-square)](https://scrutinizer-ci.com/g/bhavingajjar/laravel-api-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/bhavingajjar/laravel-api-generator.svg?style=flat-square)](https://packagist.org/packages/bhavingajjar/laravel-api-generator)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require bhavingajjar/laravel-api-generator --dev
```

## Publish Configuration File

```bash
php artisan vendor:publish --provider="Bhavingajjar\LaravelApiGenerator\LaravelApiGeneratorServiceProvider" --tag="config"
```

## Usage

``` php
php artisan api:generate --model=User
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email gajjarbhavin22@gmail.com instead of using the issue tracker.

## Credits

- [Bhavin Gajjar](https://github.com/bhavingajjar)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
