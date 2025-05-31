# Shout

[![Latest Version on Packagist](https://img.shields.io/packagist/v/awcodes/shout.svg?style=flat-square)](https://packagist.org/packages/awcodes/shout)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/shout.svg?style=flat-square)](https://packagist.org/packages/awcodes/shout)

![shout-og](https://res.cloudinary.com/aw-codes/image/upload/w_1200,f_auto,q_auto/plugins/shout/awcodes-shout.jpg)

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
    ->type('info') // or 'success', 'warning', 'danger'
```

## Usage in Infolists

Simply include the component in any of your Infolist's `schema()` methods.

```php
use Awcodes\Shout\Components\ShoutEntry;

ShoutEntry::make('so-important')
    ->content('This is a test')
    ->type('info') // or 'success', 'warning', 'danger'
```

## Custom Colors

You can use the `color()` method to set a custom color using Filament's Color Object.

```php
use Awcodes\Shout\Components\Shout;
use Filament\Support\Colors\Color;

Shout::make('so-important')
    ->color(Color::Lime)

Shout::make('so-important')
    ->color(Color::hex('#badA55'))
```

## Icons

### Changing the icon

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->icon('heroicon-s-circle-check')
```

### Icon Size

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->iconSize('sm') // or 'md', 'lg', 'xl'
```

### Disabling the icon

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->icon(false)
```

## Headings

You can add a heading to your shout using the `heading()` method. By default , the heading will be a h2 element, but you can override this by using an `HtmlString` object.

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->heading('Important Notice')
    ->content('This is a test')
```

## Actions

You can add actions to your shout using the `actions()` method. This accepts an array of Filament Action objects.

### In Forms

```php
use Awcodes\Shout\Components\Shout;
use Filament\Forms\Components\Actions\Action;

Shout::make('so-important')
    ->content('This is a test')
    ->actions([
        Action::make('action1')
            ->label('Action 1')
            ->url('https://example.com'),
        Action::make('action2')
            ->label('Action 2')
            ->url('https://example.com'),
    ])
```

### In Infolists

```php
use Awcodes\Shout\Components\ShoutEntry;
use Filament\Infolists\Components\Actions\Action;

ShoutEntry::make('so-important')
    ->content('This is a test')
    ->actions([
        Action::make('action1')
            ->label('Action 1')
            ->url('https://example.com'),
        Action::make('action2')
            ->label('Action 2')
            ->url('https://example.com'),
    ])
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
