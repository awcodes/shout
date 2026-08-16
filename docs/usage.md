---
title: Usage
description: Add a Shout to a schema and configure its content, type, colour, icon, and actions.
---

# Usage

Include the component in any form or infolist `schema()` method:

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
```

The argument to `make()` is the component's name. It must be unique within the schema — Shout throws an exception if it is blank — but because the component is never dehydrated, the name does not have to correspond to anything on your model.

## Content

`content()` sets the body of the notice. It accepts a plain string:

```php
Shout::make('so-important')
    ->content('This is a test')
```

An `HtmlString`, when you need markup inside the notice:

```php
use Illuminate\Support\HtmlString;

Shout::make('so-important')
    ->content(new HtmlString('Read the <a href="/terms">terms</a> before continuing.'))
```

Or a closure, evaluated at render time, which gives you access to the schema's injected dependencies:

```php
Shout::make('so-important')
    ->content(fn (): string => 'Last updated ' . now()->diffForHumans())
```

Plain strings are escaped. Pass an `HtmlString` when you deliberately want markup rendered, and build it from values you control.

## Headings

`heading()` adds a bold title above the content:

```php
Shout::make('so-important')
    ->heading('Important Notice')
    ->content('This is a test')
```

By default the heading is rendered as an `h2`. Pass an `HtmlString` to take over the markup entirely — the string is output as-is, with no wrapping element of Shout's own:

```php
use Illuminate\Support\HtmlString;

Shout::make('so-important')
    ->heading(new HtmlString('<h3 class="font-bold">Important Notice</h3>'))
    ->content('This is a test')
```

This is the escape hatch for matching a surrounding page's heading level, which matters for document outline and screen reader navigation.

## Types

`type()` sets the intent of the notice, which in turn sets both its colour and its icon:

```php
Shout::make('so-important')
    ->type('warning')
    ->content('This action cannot be undone.')
```

| Type | Colour | Icon |
| --- | --- | --- |
| `info` | `info` | `heroicon-o-information-circle` |
| `success` | `success` | `heroicon-o-check-circle` |
| `warning` | `warning` | `heroicon-o-exclamation-triangle` |
| `danger` | `danger` | `heroicon-o-x-circle` |

`info` is used when you do not call `type()` at all.

A closure works here too, so the type can depend on state:

```php
Shout::make('so-important')
    ->type(fn (Model $record): string => $record->isExpired() ? 'danger' : 'info')
    ->content('Subscription status')
```

> [!WARNING]
> Anything outside those four values throws `Invalid Shout type`. The check runs at render time, so a typo in a closure surfaces when the schema is drawn rather than when it is defined.

## Custom colours

`color()` overrides the colour implied by the type, using Filament's colour object:

```php
use Awcodes\Shout\Components\Shout;
use Filament\Support\Colors\Color;

Shout::make('so-important')
    ->content('This is a test')
    ->color(Color::Lime)
```

An arbitrary hex value works as well:

```php
Shout::make('so-important')
    ->content('This is a test')
    ->color(Color::hex('#badA55'))
```

Setting a colour does not change the icon. A `warning` Shout given a lime colour keeps its warning triangle — call `icon()` too if you want both to change.

## Icons

### Changing the icon

Pass any icon name:

```php
use Awcodes\Shout\Components\Shout;

Shout::make('so-important')
    ->content('This is a test')
    ->icon('heroicon-s-circle-check')
```

Filament's `Heroicon` enum is accepted too, and is worth preferring for editor autocompletion:

```php
use Filament\Support\Icons\Heroicon;

Shout::make('so-important')
    ->content('This is a test')
    ->icon(Heroicon::AcademicCap)
```

### Icon size

```php
Shout::make('so-important')
    ->content('This is a test')
    ->iconSize('lg')
```

Sizes are the cases of `Filament\Support\Enums\IconSize` — `xs`, `sm`, `md`, `lg`, `xl`, and `2xl` — and the enum itself can be passed instead of the string:

```php
use Filament\Support\Enums\IconSize;

Shout::make('so-important')
    ->content('This is a test')
    ->iconSize(IconSize::ExtraLarge)
```

`md` is used when `iconSize()` is not called.

### Disabling the icon

Pass `false` to render the notice with no icon at all:

```php
Shout::make('so-important')
    ->content('This is a test')
    ->icon(false)
```

## Actions

`actions()` accepts an array of Filament actions, rendered below the content:

```php
use Awcodes\Shout\Components\Shout;
use Filament\Actions\Action;

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

Actions are registered with the schema, so everything an action can normally do works here — URLs, modals, Livewire actions, notifications. Hidden actions are filtered out before rendering, so an action whose `visible()` condition is false leaves no gap behind.

A closure can be passed instead of an array when the set of actions depends on state.

### Inline actions

By default actions are stacked underneath the content. `inlineActions()` moves them onto the same row as the content, aligned to the right of the notice:

```php
Shout::make('so-important')
    ->content('This is a test')
    ->inlineActions()
    ->actions([
        Action::make('dismiss')
            ->label('Dismiss'),
    ])
```

This suits a single short action next to a one-line message. Longer content, or more than one or two actions, reads better stacked.
