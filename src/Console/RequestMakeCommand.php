<?php

namespace DevSquad\Architecture\Console;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class RequestMakeCommand extends GeneratorCommand
{
    protected $name = 'make:ds-request';
    protected $description = 'Create a new request class. Needs to provide a form class.';
    protected $type = 'Request';

    protected function alreadyExists($rawName)
    {
        return class_exists($rawName);
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/request.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Requests';
    }

    protected function buildClass($name)
    {
        $form = $this->option('form');

        return str_replace(
            'DummyForm', $form, parent::buildClass($name)
        );
    }

    protected function getOptions()
    {
        return [
            ['form', 'f', InputOption::VALUE_REQUIRED, 'The name of the form'],
        ];
    }
}
