<?php

namespace DevSquad\Extensions;

use DevSquad\Extensions\Console\FormMakeCommand;
use DevSquad\Extensions\Console\MigrateMakeCommand;
use DevSquad\Extensions\Console\PayloadMakeCommand;
use DevSquad\Extensions\Console\RequestMakeCommand;
use DevSquad\Extensions\Console\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;

class DevSquadExtensionProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PayloadMakeCommand::class,
                RequestMakeCommand::class,
                ServiceMakeCommand::class,
            ]);
        }

        $this->app->extend('command.make.migration', function () {
            logger()->info('Our own migrate command');
            return $this->app->make(MigrateMakeCommand::class);
        });
    }

    public function register()
    {
        //
    }
}
