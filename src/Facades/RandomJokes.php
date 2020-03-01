<?php

namespace KennedyOsaze\RandomJokes\Facades;

use Illuminate\Support\Facades\Facade;

class RandomJokes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'random-jokes';
    }
}
