<?php

namespace DevSquad\Extensions\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class ServiceMakeCommand extends GeneratorCommand
{
    protected $name = 'make:ds-service';
    protected $description = 'Create a new service class. Needs to provide a model';
    protected $type = 'Service';

    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/service.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Services';
    }

    protected function buildClass($name)
    {
        $form = $this->option('model');

        return str_replace(
            'DummyModel', $form, parent::buildClass($name)
        );
    }

    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_REQUIRED, 'The name of the model'],
        ];
    }
}
