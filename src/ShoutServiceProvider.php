<?php

namespace Awcodes\Shout;

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
}
