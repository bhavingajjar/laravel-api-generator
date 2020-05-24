<?php

namespace Bhavingajjar\LaravelApiGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bhavingajjar\LaravelApiGenerator\LaravelApiGenerator
 */
class LaravelApiGeneratorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-api-generator';
    }
}
