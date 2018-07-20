<?php

namespace DevSquad\Extensions;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public abstract function form();

    protected function context()
    {
        return collect(
            array_merge(
                $this->all(),
                [
                    'user'  => $this->user(),
                    'route' => $this->route(),
                ]
            )
        );
    }
}
