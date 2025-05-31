<?php

namespace Awcodes\Shout\Tests\Fixtures;

use Awcodes\Shout\Components\ShoutEntry;
use Filament\Infolists\Infolist;

class TestEntryComponent extends TestInfolist
{
    public function testInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record(null)
            ->schema([
                ShoutEntry::make('notice')
                    ->heading('Test Heading')
                    ->content('Some test content'),
            ]);
    }
}
