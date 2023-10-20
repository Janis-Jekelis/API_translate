<?php
declare(strict_types=1);
namespace App;

class Joke
{
    private string $call="get random joke";
    private string $joke;


    public function __construct()
    {
        $source=json_decode(file_get_contents("https://official-joke-api.appspot.com/random_joke"));

        $this->joke=$source->setup . PHP_EOL . $source->punchline . PHP_EOL;
    }

        public function getCall(): string
    {
        return $this->call;
    }

    public function getOutput(): string
    {
        return $this->joke;
    }
}


