<?php

use Awcodes\Shout\Components\ShoutEntry;
use Awcodes\Shout\Tests\Fixtures\TestEntryComponent;
use Awcodes\Shout\Tests\Fixtures\TestInfolist;
use Filament\Infolists\ComponentContainer;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

use function Pest\Livewire\livewire;

it('has correct heading', function (string | Htmlable | Closure $content) {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->heading($content);

    expect($field)
        ->getHeading()->toBe($content);
})->with([
    'Test content',
    new HtmlString('<strong><em>Standard Info Shout.</em></strong>'),
    fn () => 'Test content',
]);

it('has correct content', function (string | Htmlable | Closure $content) {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->content($content);

    expect($field)
        ->getContent()->toBe($content);
})->with([
    'Test content',
    new HtmlString('<strong><em>Standard Info Shout.</em></strong>'),
    fn () => 'Test content',
]);

it('has correct type', function (string | Closure $type) {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->type($type);

    expect($field)
        ->getType()->toBe($type)
        ->getColor()->toBe($type);
})->with([
    'danger',
    fn () => 'success',
]);

it('has correct custom color', function (string | array | Closure $color) {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->color($color);

    expect($field)
        ->getColor()->toBe($color);
})->with([
    Color::Pink,
    Color::hex('#badA55'),
    fn () => Color::Slate,
]);

it('has correct icon', function (string | Closure $icon) {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->icon($icon);

    expect($field)
        ->getIcon()->toBe($icon);
})->with([
    'heroicon-s-circle-check',
    fn () => 'heroicon-s-circle-check',
]);

it('has correct icon size', function (string | Closure $icon) {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->iconSize($icon);

    expect($field)
        ->getIconSize()->toBe($icon);
})->with([
    'md',
    fn () => 'lg',
]);

it('can disable icon', function () {
    $field = (new ShoutEntry('notice'))
        ->container(ComponentContainer::make(TestInfolist::make()))
        ->icon(false);

    expect($field)
        ->getIcon()->toBeEmpty();
});

it('renders correctly', function () {
    livewire(TestEntryComponent::class)
        ->assertSee('Test Heading')
        ->assertSee('Some test content')
        ->assertSee('--info')
        ->assertSee('svg');
});
