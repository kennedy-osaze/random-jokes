<?php

namespace KennedyOsaze\RandomJokes;

class JokeFactory
{
    protected $jokes = [];

    public function __construct(array $jokes = [])
    {
        $this->jokes = $jokes ?: self::defaultJokes();
    }

    public function getRandomJoke()
    {
        return $this->jokes[array_rand($this->jokes)];
    }

    public static function defaultJokes()
    {
        return [
            'Nothing makes a woman more confused than a relationship with a broke man who is extremely good in bed.',
            'Dating a slim or slender guy is cool. The problem is when you are lying on his chest then his ribs draws adidas lines on your face.',
            'He who swallows a coconut, must have great faith in his anus.',
            'No girl will choose six packs over six cars. Stop going to the gym and go to work.'
        ];
    }
}
