<?php

namespace KennedyOsaze\RandomJokes;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
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

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'random-jokes');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/random-jokes'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../config/random-jokes.php' => config_path('random-jokes.php'),
        ], 'config');

        Route::get(config('random-jokes.route'), RandomJokeController::class);
    }

    public function register()
    {
        $this->app->bind('random-jokes', function () {
            return new JokeFactory();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/random-jokes.php', 'random-jokes');
    }
}
