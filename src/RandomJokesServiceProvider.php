<?php

namespace KennedyOsaze\RandomJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use KennedyOsaze\RandomJokes\JokeFactory;
use KennedyOsaze\RandomJokes\Console\RandomJoke;
use KennedyOsaze\RandomJokes\Http\Controllers\RandomJokeController;

class RandomJokesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                RandomJoke::class,
            ]);
        }

        Route::get('random-jokes', RandomJokeController::class);
    }

    public function register()
    {
        $this->app->bind('random-jokes', function () {
            return new JokeFactory();
        });
    }
}
