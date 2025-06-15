<?php

declare(strict_types=1);

use Awcodes\Shout\Components\Shout;
use Awcodes\Shout\Tests\Fixtures\Livewire;
use Awcodes\Shout\Tests\TestCase;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconSize;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

uses(TestCase::class);

beforeEach(function () {
    $this->component = (new Shout('test_shout'))
        ->container(Schema::make(Livewire::make()));
});

it('has correct heading', function (string|Htmlable|Closure $content) {
    $this->component->heading($content);

    expect($this->component)
        ->getHeading()->toBe($content);
})->with([
    'Test content',
    new HtmlString('<strong><em>Standard Info Shout.</em></strong>'),
    fn () => 'Test content',
]);

it('has correct content', function (string|Htmlable|Closure $content) {
    $this->component->content($content);

    expect($this->component)
        ->getContent()->toBe($content);
})->with([
    'Test content',
    new HtmlString('<strong><em>Standard Info Shout.</em></strong>'),
    fn () => 'Test content',
]);

it('has correct type', function (string|Closure $type) {
    $this->component->type($type);

    expect($this->component)
        ->getType()->toBe($type)
        ->getColor()->toBe($type);
})->with([
    'danger',
    fn () => 'success',
]);

it('has correct custom color', function (string|array|Closure $color) {
    $this->component->color($color);

    expect($this->component)
        ->getColor()->toBe($color);
})->with([
    Color::Pink['500'],
    '#badA55',
    fn () => Color::Slate['500'],
]);

it('has correct icon', function (string|Closure|Heroicon $icon) {
    $this->component->icon($icon);

    expect($this->component)
        ->getIcon()->toBe($icon);
})->with([
    'heroicon-s-circle-check',
    fn () => 'heroicon-s-circle-check',
    Heroicon::AcademicCap,
]);

it('has correct icon size', function (string|Closure|IconSize $icon) {
    $this->component->iconSize($icon);

    expect($this->component)
        ->getIconSize()->toBe($icon);
})->with([
    'md',
    fn () => 'lg',
    IconSize::ExtraLarge,
]);

it('can disable icon', function () {
    $this->component->icon(false);

    expect($this->component)
        ->getIcon()->toBeEmpty();
});

it('has correct actions', function () {
    $actions = [
        Action::make('test')
            ->link()
            ->color('info')
            ->action(fn () => dd('This is a test')),
        Action::make('send')
            ->size('sm')
            ->action(fn () => Notification::make('test_notification')
                ->success()
                ->title('This is a test notification.')
                ->send()),
    ];

    $this->component->actions($actions);

    expect($this->component)
        ->getActions()->toHaveKeys(['test', 'send']);
});
