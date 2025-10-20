<?php

declare(strict_types=1);

class WorldCityRepository
{

    public function __construct(private PDO $pdo) {}

    public function fetch(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` ORDER BY `population` DESC LIMIT 10');
        $stmt->execute();

        // Stores 'WorldCityModel' objects
        $models = [];

        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Iterate through the fetched entries, instantiate each entry as a 'WorldCityModel' object
        // Stores each object into the array
        foreach ($entries as $entry):
            $models[] = new WorldCityModel(
                $entry['id'],
                $entry['city'],
                $entry['city_ascii'],
                (float) $entry['lat'],
                (float) $entry['lng'],
                $entry['country'],
                $entry['iso2'],
                $entry['iso3'],
                $entry['admin_name'],
                $entry['capital'],
                $entry['population']
            );
        endforeach;

        return $models;
    }
}
