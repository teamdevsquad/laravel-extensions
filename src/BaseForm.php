<?php

namespace DevSquad\Extensions;

use Illuminate\Support\Collection;

/**
 * @property \Illuminate\Routing\Route route
 */
class BaseForm
{
    /** @var Collection $context */
    protected $context;

    /**
     * BaseForm constructor.
     * @param Collection $context
     */
    public function __construct($context)
    {
        $this->context = $context;
    }

    public function getUser()
    {
        return $this->context->get('user');
    }

    public function getRoute()
    {
        return $this->context->get('route');
    }

    public function __get($field)
    {
        $method = lcfirst(str_replace('_', '', ucwords($field, '_')));
        $field  = lcfirst($field);
        $method = "get{$method}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        if ($this->context->has($field)) {
            return $this->context->get($field);
        }
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
