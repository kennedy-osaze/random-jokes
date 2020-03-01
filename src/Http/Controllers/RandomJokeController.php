<?php

namespace KennedyOsaze\RandomJokes\Http\Controllers;

use KennedyOsaze\RandomJokes\Facades\RandomJokes;

class RandomJokeController
{
    public function __invoke()
    {
        return RandomJokes::getRandomJoke();
    }
}