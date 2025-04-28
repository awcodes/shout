<?php

use Awcodes\Shout\Components\Shout;
use Awcodes\Shout\Tests\Fixtures\TestForm;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconSize;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

beforeEach(function () {
    $this->component = (new Shout)
        ->container(Schema::make(TestForm::make()));
});

it('has correct content', function (string | Htmlable | Closure $content) {
    $this->component->content($content);

    expect($this->component)
        ->getContent()->toBe($content);
})->with([
    'Test content',
    new HtmlString('<strong><em>Standard Info Shout.</em></strong>'),
    fn () => 'Test content',
]);

it('has correct type', function (string | Closure $type) {
    $this->component->type($type);

    expect($this->component)
        ->getType()->toBe($type)
        ->getColor()->toBe($type);
})->with([
    'danger',
    fn () => 'success',
]);

it('has correct custom color', function (string | array | Closure $color) {
    $this->component->color($color);

    expect($this->component)
        ->getColor()->toBe($color);
})->with([
    Color::Pink['500'],
    '#badA55',
    fn () => Color::Slate['500'],
]);

it('has correct icon', function (string | Closure | Heroicon $icon) {
    $this->component->icon($icon);

    expect($this->component)
        ->getIcon()->toBe($icon);
})->with([
    'heroicon-s-circle-check',
    fn () => 'heroicon-s-circle-check',
    Heroicon::AcademicCap,
]);

it('has correct icon size', function (string | Closure | IconSize $icon) {
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
