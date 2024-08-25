<?php

use Awcodes\Shout\Components\Shout;
use Awcodes\Shout\Tests\Fixtures\TestFieldComponent;
use Awcodes\Shout\Tests\Fixtures\TestForm;
use Filament\Forms\ComponentContainer;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

use function Pest\Livewire\livewire;

it('has correct content', function (string | Htmlable | Closure $content) {
    $field = (new Shout('notice'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->content($content);

    expect($field)
        ->getContent()->toBe($content);
})->with([
    'Test content',
    new HtmlString('<strong><em>Standard Info Shout.</em></strong>'),
    fn () => 'Test content',
]);

it('has correct type', function (string | Closure $type) {
    $field = (new Shout('notice'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->type($type);

    expect($field)
        ->getType()->toBe($type)
        ->getColor()->toBe($type);
})->with([
    'danger',
    fn () => 'success',
]);

it('has correct custom color', function (string | array | Closure $color) {
    $field = (new Shout('notice'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->color($color);

    expect($field)
        ->getColor()->toBe($color);
})->with([
    Color::Pink,
    Color::hex('#badA55'),
    fn () => Color::Slate,
]);

it('has correct icon', function (string | Closure $icon) {
    $field = (new Shout('notice'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->icon($icon);

    expect($field)
        ->getIcon()->toBe($icon);
})->with([
    'heroicon-s-circle-check',
    fn () => 'heroicon-s-circle-check',
]);

it('has correct icon size', function (string | Closure $icon) {
    $field = (new Shout('notice'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->iconSize($icon);

    expect($field)
        ->getIconSize()->toBe($icon);
})->with([
    'md',
    fn () => 'lg',
]);

it('can disable icon', function () {
    $field = (new Shout('notice'))
        ->container(ComponentContainer::make(TestForm::make()))
        ->icon(false);

    expect($field)
        ->getIcon()->toBeEmpty();
});

it('renders correctly', function () {
    livewire(TestFieldComponent::class)
        ->assertSee('Some test content')
        ->assertSee('--info')
        ->assertSee('svg');
});
