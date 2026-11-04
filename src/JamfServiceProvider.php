<?php

namespace spkm\Jamf;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class JamfServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('jamf')
            ->hasConfigFile('jamf')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->publishConfigFile();
            });

        $this->app->singleton('jamf', fn ($app) => new JamfService);
    }
}
