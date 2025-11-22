<?php

// Enable strict mode
declare(strict_types=1);

namespace App\Weather;

// Mock implementation of a 3rd-party weather API that returns a random temperature & weather type
class RandomWeatherFetcher implements WeatherFetcherInterface
{
    public function fetch(string $city): WeatherInfo
    {
        $weatherTypes = [
            "sunny",
            "stormy",
            "cloudy",
            "snowy"
        ];

        return new WeatherInfo($city, rand(270, 330), $weatherTypes[array_rand($weatherTypes)]);
    }
}
