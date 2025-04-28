<?php

use Awcodes\Shout\Tests\TestCase;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

pest()
    ->extend(TestCase::class)
    ->use(LazilyRefreshDatabase::class)
    ->in('src/Feature', 'src/Unit');
