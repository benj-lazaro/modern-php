<?php

namespace App\Weather;

class WeatherInfo
{
    // Constructor
    public function __construct(
        public string $city,
        public int $temperatureK,
        public string $weatherType
    ) {}
}
