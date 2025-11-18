<?php

namespace App\Weather;

// Mock implementation of a 3rd-party weather API
class FakeWeatherFetcher implements WeatherFetcherInterface
{
    public function fetch(string $city): WeatherInfo
    {
        return new WeatherInfo($city, 270, 'storm');
    }
}
