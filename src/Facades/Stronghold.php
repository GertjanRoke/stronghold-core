<?php

namespace GertjanRoke\Stronghold\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GertjanRoke\Stronghold\Stronghold
 */
class Stronghold extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'stronghold-core';
    }
}
