<?php

namespace KennedyOsaze\RandomJokes;

use Illuminate\Support\ServiceProvider;
use KennedyOsaze\RandomJokes\JokeFactory;

class RandomJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('random-jokes', function () {
            return new JokeFactory();
        });
    }
}