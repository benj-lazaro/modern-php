<?php

declare(strict_types=1);

class WorldCityRepository
{

    public function __construct(private PDO $pdo) {}

    public function fetchById($id): ?WorldCityModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` WHERE `id` = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($entry)):
            // Return an instantiated object based on the data retrieved from the database
            return new WorldCityModel(
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
        else:
            return null;
        endif;
    }

    public function fetch(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` ORDER BY `population` DESC LIMIT 10');
        $stmt->execute();


        $models = [];

        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
