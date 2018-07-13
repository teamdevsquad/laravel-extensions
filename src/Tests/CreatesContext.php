<?php


namespace DevSquad\Extensions\Tests;


trait CreatesContext
{
    protected function createContext($data, $user)
    {
        return collect(array_merge($data, ['user' => $user]));
    }
}
