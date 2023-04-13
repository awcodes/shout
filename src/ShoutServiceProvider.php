<?php

namespace Awcodes\Shout;

use Composer\InstalledVersions;
use Filament\PluginServiceProvider;
use OutOfBoundsException;
use Spatie\LaravelPackageTools\Package;

class ShoutServiceProvider extends PluginServiceProvider
{
    public static string $name = 'shout';

    public static string $version = 'dev';

    public function configurePackage(Package $package): void
    {
        try {
            static::$version = InstalledVersions::getPrettyVersion('awcodes/shout');
        } catch (OutOfBoundsException $e) {
        }

        $package->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }

    public function getStyles(): array
    {
        if (config('shout.disable_css')) {
            return [];
        }

        return [
            'plugin-'.static::$name.'-'.static::$version => __DIR__.'/../resources/dist/'.static::$name.'.css',
        ];
    }
}
