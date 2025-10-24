<?php

declare(strict_types=1);

class WorldCityRepository
{
    // Establish a database connection
    public function __construct(private PDO $pdo) {}

    // Implement retrieved database record's data into an instantiated object
    private function arrayToModel(array $entry): WorldCityModel
    {
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
    }

    // Fetch a database record by column `id`
    public function fetchById($id): ?WorldCityModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` WHERE `id` = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($entry)):
            return $this->arrayToModel($entry);
        else:
            return null;
        endif;
    }

    // Fetch 10 database records ordered by `population`
    public function fetch(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` ORDER BY `population` DESC LIMIT 10');
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $models = [];

        foreach ($entries as $entry):
            $models[] = $this->arrayToModel($entry);
        endforeach;

        return $models;
    }
}
