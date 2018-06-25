<?php

namespace DevSquad\Extensions\Console;

use Illuminate\Console\GeneratorCommand;

class FormMakeCommand extends GeneratorCommand
{
    protected $name = 'make:ds-form';
    protected $description = 'Create a new form class';
    protected $type = 'Form';

    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/form.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Forms';
    }
}
