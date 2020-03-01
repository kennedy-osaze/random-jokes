<?php

namespace KennedyOsaze\RandomJokes\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Artisan;
use KennedyOsaze\RandomJokes\Facades\RandomJokes;
use KennedyOsaze\RandomJokes\RandomJokesServiceProvider;

class LaravelTest extends TestCase
{
    public function testConsoleCommandReturnsAJoke()
    {
        $this->withoutMockingConsoleOutput();

        RandomJokes::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->artisan('random-joke');

        $output = Artisan::output();

        $this->assertSame('some joke' . PHP_EOL, $output);
    }

    public function testRouteCanBeAccessed()
    {
        $this->get('/random-jokes')
            ->assertStatus(200);
    }

    protected function getPackageProviders($app)
    {
        return [
            RandomJokesServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'RandomJokes' => RandomJokes::class,
        ];
    }
}