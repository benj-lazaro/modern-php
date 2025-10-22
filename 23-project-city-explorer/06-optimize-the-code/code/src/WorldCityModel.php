<?php

class WorldCityModel
{
    // Constructor
    public function __construct(
        public int $id,
        public string $city,
        public string $cityAscii,
        public float $lat,
        public float $lng,
        public string $country,
        public string $iso2,
        public string $iso3,
        public string $adminName,
        public string $capital,
        public int $population
    ) {}

    // Class method
    public function getCityWithCountry(): string
    {
        return "{$this->city} ({$this->country})";
    }
}
