<?php

namespace Awcodes\Shout;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShoutServiceProvider extends PackageServiceProvider
{
    public static string $name = 'shout';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        if ($this->app->runningInConsole()) {
            FilamentAsset::register([
                Css::make('plugin-shout-styles', __DIR__ . '/../resources/dist/shout.css'),
            ], 'awcodes/shout');
        }
    }
}
