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

    // Fetch the total number of records in the database
    public function count(): int
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS `count` FROM `worldcities`');
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['count'];
    }

    // Paginate list of cities
    public function paginate(int $page, int $entriesPerPage = 15): array
    {
        // Prevents a maliciously entered negative 'page' number
        $page = max(1, $page);

        $stmt = $this->pdo->prepare('SELECT * 
            FROM `worldcities` 
            ORDER BY `population` DESC 
            LIMIT :limit OFFSET :offset');

        // Bind placeholders to their correponding variables, typecast values as int
        $stmt->bindValue(':limit', $entriesPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', ($page - 1) * $entriesPerPage, PDO::PARAM_INT);

        $stmt->execute();

        $models = [];
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($entries as $entry):
            $models[] = $this->arrayToModel($entry);
        endforeach;

        return $models;
    }

    // Update the record's properties stored in the database
    public function update(int $id, array $properties): WorldCityModel
    {
        $stmt = $this->pdo->prepare('UPDATE `worldcities` SET 
            `city` = :city, 
            `city_ascii` = :cityAscii,
            `country` = :country,
            `iso2` = :iso2,
            `population` = :population WHERE `id` = :id');

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':city', $properties['city']);
        $stmt->bindValue(':cityAscii', $properties['cityAscii']);
        $stmt->bindValue(':country', $properties['country']);
        $stmt->bindValue(':iso2', $properties['iso2']);
        $stmt->bindValue(':population', $properties['population']);

        $stmt->execute();

        // Fetch & return the updated record from the database for rendering
        return $this->fetchById($id);
    }
}
