<?php

namespace KennedyOsaze\RandomJokes\Http\Controllers;

use KennedyOsaze\RandomJokes\Facades\RandomJokes;

class RandomJokeController
{
    public function __invoke()
    {
        return view('random-jokes::joke', [
            'joke' => RandomJokes::getRandomJoke(),
        ]);
    }
}