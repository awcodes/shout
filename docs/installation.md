---
title: Installation
description: Install Shout with Composer and register its views with your Tailwind theme.
---

# Installation

## Compatibility

| Filament version | Package version |
|------------------|-----------------|
| 2.x              | 1.x             |
| 3.x              | 2.x             |
| 4.x              | 3.x             |
| 4.x & 5.x        | 4.x             |

Shout requires PHP 8.2 or later and `filament/filament`.

## Install the package

Install with Composer:

```bash
composer require awcodes/shout
```

The service provider is registered automatically, and there is no configuration file to publish.

## Register the views with Tailwind

Shout's styles come from classes in its Blade views, so your Tailwind build has to be able to see those views. Add the package as a source in your theme's CSS file:

```css
@source '../../../../vendor/awcodes/shout/resources/**/*.blade.php';
```

If you are using the standalone Filament packages rather than Panels, add the same line to your application's CSS file instead.

> [!IMPORTANT]
> Panel users need a custom theme before this line has anywhere to live. If you have not created one yet, follow [Creating a custom theme](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) in the Filament documentation first.

The relative path above assumes the conventional theme location, `resources/css/filament/<panel>/theme.css`. Adjust the number of `../` segments if your theme lives somewhere else — the path has to resolve to `vendor/awcodes/shout/resources` from the file it is written in.

Without this step the component still renders, but with none of its colours, spacing, or borders.

## Next steps

Continue to [Usage](usage.md) to add your first Shout to a schema.
