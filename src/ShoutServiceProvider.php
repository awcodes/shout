<?php

namespace Awcodes\Shout;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShoutServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('shout')
            ->hasAssets()
            ->hasViews();
    }

    public function boot(): void
    {
        parent::boot();

        if (app()->runningInConsole()) {
            FilamentAsset::register([
                Css::make('shout', __DIR__ . '/../resources/dist/shout.css'),
            ], 'awcodes/shout');
        }
    }
}
