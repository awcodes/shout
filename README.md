# Shout

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/shout.svg?style=flat-square)](https://packagist.org/packages/awcodes/shout)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/shout.svg?style=flat-square)](https://packagist.org/packages/awcodes/shout)

![shout-og](https://github.com/awcodes/shout/assets/3596800/824ecf78-0a0c-482c-8137-0ca48786869f)

A simple inline contextual notice for Filament forms, basically just a fancy placeholder.

## Installation

You can install the package via composer:

```bash
composer require awcodes/shout
```

## Usage in Forms

Simply include the component in any of your form's `schema()` methods.

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
```

## Usage in Infolists

Simply include the component in any of your Infolist's `schema()` methods.

```php
use Awcodes\Shout\Components\ShoutEntry;

ShoutEntry::make('so-important')
    ->content('This is a test')
    ->type('info|success|warning|danger')
```

## Custom Colors

You can use the `color()` method to set a custom color using Filament's Color Object.

```php
use Awcodes\Shout\Components\Shout;
use Filament\Support\Colors\Color;

Shout::make('so-important')
    ->content('This is a test')
    ->color(Color::Lime)

Shout::make('so-important')
    ->content('This is a test')
    ->color(Color::hex('#badA55'))
```

## Icons

### Changing the icon

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
    ->icon('heroicon-s-circle-check')
```

### Icon Size

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
    ->iconSize('sm|md|lg|xl')
```

### Disabling the icon

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
    ->icon(false)
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
