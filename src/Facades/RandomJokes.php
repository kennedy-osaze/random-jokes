<?php

namespace KennedyOsaze\RandomJokes\Facades;

/**
 * @method static string getRandomJoke()
 *
 * @see \KennedyOsaze\RandomJokes\JokeFactory
 */

use Illuminate\Support\Facades\Facade;

class RandomJokes extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'random-jokes';
    }
}
