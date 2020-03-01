<?php

namespace KennedyOsaze\RandomJokes;

use Illuminate\Support\ServiceProvider;
use KennedyOsaze\RandomJokes\JokeFactory;
use KennedyOsaze\RandomJokes\Console\RandomJoke;

class RandomJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RandomJoke::class,
            ]);
        }
    }

    public function register()
    {
        $this->app->bind('random-jokes', function () {
            return new JokeFactory();
        });
    }
}
