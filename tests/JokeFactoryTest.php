<?php

namespace KennedyOsaze\RandomJokes\Tests;

use KennedyOsaze\RandomJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    public function testRandomJokeIsReturned()
    {
        $jokes = new JokeFactory([
            'This is a random joke',
        ]);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a random joke', $joke);
    }

    public function testRandomJokeIsPredefined()
    {
        $jokes = new JokeFactory();

        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, JokeFactory::defaultJokes());
    }
}
