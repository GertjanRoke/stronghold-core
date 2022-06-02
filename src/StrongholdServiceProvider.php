<?php

namespace GertjanRoke\Stronghold;

use GertjanRoke\Stronghold\Commands\StrongholdCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StrongholdServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('stronghold-core')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_stronghold-core_table')
            ->hasCommand(StrongholdCommand::class);
    }
}
