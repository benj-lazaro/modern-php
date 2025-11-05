<?php

// Models the columns (fields) of a record in the database 'worldcities'
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
        public int $population,
    ) {}

    // Method that generates a string from the properties '$city', '$iso2' & '$country'
    public function getCityWithCountry(): string
    {
        return "{$this->city} ({$this->getFlag()} {$this->country})";
    }

    // Method that returns the multibyte string of the property '$iso2'
    public function getFlag(): string
    {
        return get_flag_for_country($this->iso2);
    }
}
