<?php

namespace KennedyOsaze\RandomJokes;

use GuzzleHttp\Client;

class JokeFactory
{
    public const API_ENDPOINT = 'http://jokes.guyliangilsing.me/retrieveJokes.php?type=random';

    protected $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function getRandomJoke()
    {
        $response = $this->client->get(self::API_ENDPOINT);

        $responseData = json_decode($response->getBody()->getContents());

        return $responseData->joke;
    }
}
