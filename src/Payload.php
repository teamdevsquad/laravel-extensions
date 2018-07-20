<?php

namespace DevSquad\Extensions;

use Illuminate\Support\Collection;

abstract class Payload
{
    protected $context;

    public function __construct(Collection $context)
    {
        $this->context = $context;
    }

    public function __get($field)
    {
        $method = lcfirst(str_replace('_', '', ucwords($field, '_')));
        $field = lcfirst($field);
        $method = "get{$method}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return $this->context->has($field) ? $this->context->get($field) : null;
    }

    public function __call($method, $parameters)
    {
        if ($this->context->has($method)) {
            return $this->context->get($method);
        }

        $className = static::class;

        throw new \BadMethodCallException("Call to undefined method {$className}::{$method}()");
    }
}
