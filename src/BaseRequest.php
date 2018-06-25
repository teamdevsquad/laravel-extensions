<?php

namespace DevSquad\Architecture;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
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
