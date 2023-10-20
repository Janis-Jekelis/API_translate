<?php
declare(strict_types=1);

namespace App;

class Activity
{
    private string $call = "get random activity";
    private string $activity;

    public function __construct()
    {
        $source = json_decode(file_get_contents("https://www.boredapi.com/api/activity"));
        $this->activity = $source->activity . PHP_EOL;
    }

    public function getCall(): string
    {
        return $this->call;
    }


    public function getOutput(): string
    {
        return $this->activity;
    }
}