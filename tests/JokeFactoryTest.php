<?php

namespace KennedyOsaze\RandomJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use KennedyOsaze\RandomJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    public function testRandomJokeIsReturned()
    {
        $rawResponse = '{"status":200,"response":"success","joke":"What did the ocean say to the beach? Thanks for all the sediment.","type":"Dad Joke: "}';

        $mock = new MockHandler([
            new Response(200, [], $rawResponse),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeFactory($client);

        $joke = $jokes->getRandomJoke();

        $this->assertSame('What did the ocean say to the beach? Thanks for all the sediment.', $joke);
    }
}
