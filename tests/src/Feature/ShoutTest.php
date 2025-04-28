<?php

use Awcodes\Shout\Tests\Fixtures\TestForm;

use function Pest\Livewire\livewire;

it('renders correctly', function () {
    livewire(TestForm::class)
        ->assertSuccessful();
});
