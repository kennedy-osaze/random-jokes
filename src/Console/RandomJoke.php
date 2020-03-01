<?php

namespace KennedyOsaze\RandomJokes\Console;

use Illuminate\Console\Command;
use KennedyOsaze\RandomJokes\Facades\RandomJokes;

class RandomJoke extends Command
{
    protected $signature = 'random-joke';

    protected $description = 'Output a random joke.';

    public function handle()
    {
        $this->info(RandomJokes::getRandomJoke());
    }
}
