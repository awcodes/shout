# Shout

A simple inline contextual notice for Filament forms and infolist, basically just a fancy placeholder.

[![Latest Version](https://img.shields.io/github/release/awcodes/shout.svg?style=flat-square&color=blue&label=Release)](https://github.com/awcodes/shout/releases)
[![MIT Licensed](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/shout.svg?style=flat-square&color=blue&label=Downloads)](https://packagist.org/packages/awcodes/shout)
[![GitHub Repo stars](https://img.shields.io/github/stars/awcodes/shout?style=flat-square&color=blue&label=Stars)](https://github.com/awcodes/shout/stargazers)

## Compatibility

| Package Version | Filament Version |
|-----------------|------------------|
| 1.x             | 2.x              |
| 2.x             | 3.x              |
| 3.x             | 4.x              |
| 4.x             | 5.x              |

<!-- [docs_start] -->

## Installation

You can install the package via composer:

```bash
composer require awcodes/shout
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file or your app's css file if using the standalone packages.

```css
@source '../../../../vendor/awcodes/shout/resources/**/*.blade.php';
```

## Usage

Simply include the component in any of your form or infolists `schema()` methods.

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
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

<!-- [docs_end] -->

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
