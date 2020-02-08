# Random Jokes

Create any random joke in your next PHP project.

## Installation

Require the package using [composer](https://getcomposer.org):

```bash
composer require kennedyosaze/random-jokes
```

## Usage

```php
use KennedyOsaze\RandomJokes\JokeFactory;

$jokes = new JokeFactory();

$jokes->getRandomJoke();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](./LICENSE.md)