<?php

namespace DevSquad\Architecture;

use DevSquad\Architecture\Console\FormMakeCommand;
use DevSquad\Architecture\Console\RequestMakeCommand;
use DevSquad\Architecture\Console\ServiceMakeCommand;
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
