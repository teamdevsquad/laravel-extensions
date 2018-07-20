<?php

namespace DevSquad\Extensions\Console;

use Illuminate\Console\GeneratorCommand;

class PayloadMakeCommand extends GeneratorCommand
{
    protected $name = 'make:payload';
    protected $description = 'Create a new payload class';
    protected $type = 'Payload';

    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/payload.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Payloads';
    }
}
