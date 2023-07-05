# Shout

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/shout.svg?style=flat-square)](https://packagist.org/packages/awcodes/shout)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/shout.svg?style=flat-square)](https://packagist.org/packages/awcodes/shout)

A simple inline contextual notice for Filament forms, basically just a fancy placeholder.

## Installation

You can install the package via composer:

```bash
composer require awcodes/shout
```

## Usage

Shout is a wrapper around Filament's Placeholder component, so it will also work with the methods available to that component. Simply include the component in any of your form `schema()` methods.

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
    ->type('info|success|warning|danger')
```

## Disabling the Icon

Should you need to disable the icon, you can do so by calling the `disableIcon()` method.

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
    ->disableIcon()
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
