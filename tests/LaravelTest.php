<?php

namespace KennedyOsaze\RandomJokes\Tests;

use Illuminate\Support\Facades\Artisan;
use KennedyOsaze\RandomJokes\Facades\RandomJokes;
use KennedyOsaze\RandomJokes\Models\Joke;
use KennedyOsaze\RandomJokes\RandomJokesServiceProvider;
use Orchestra\Testbench\TestCase;

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

        $this->assertSame('some joke'.PHP_EOL, $output);
    }

    public function testRouteCanBeAccessed()
    {
        RandomJokes::shouldReceive('getRandomJoke')
            ->once()
            ->andReturn('some joke');

        $this->get('/random-jokes')
            ->assertViewIs('random-jokes::joke')
            ->assertViewHas('joke', 'some joke')
            ->assertStatus(200);
    }

    public function testDatabaseCanBeAccessed()
    {
        $joke = Joke::create(['joke' => 'This is funny']);

        $newJoke = Joke::find($joke->id);

        $this->assertSame($newJoke->joke, 'This is funny');
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

    protected function getEnvironmentSetUp($app)
    {
        require_once __DIR__.'/../database/migrations/create_jokes_table.php.stub';

        (new \CreateJokesTable())->up();
    }
}
