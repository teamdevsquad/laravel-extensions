<?php

namespace DevSquad\Extensions;

use DevSquad\Extensions\Console\FormMakeCommand;
use DevSquad\Extensions\Console\RequestMakeCommand;
use DevSquad\Extensions\Console\ServiceMakeCommand;
use Illuminate\Support\ServiceProvider;

class DevSquadArchitectureProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FormMakeCommand::class,
                RequestMakeCommand::class,
                ServiceMakeCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
