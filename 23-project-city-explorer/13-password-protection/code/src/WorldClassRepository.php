<?php
// Enable strict_types mode
declare(strict_types=1);

// Responsible for fetching & updating of records from and to the database, respectively
class WorldClassRepository
{

    // Constructor; establish connection to the database
    public function __construct(private PDO $pdo) {}

    // Method that takes an array, instantiate its element(s) into a WorldCityModel object
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

    // Method that fetches a record from the database by its id
    public function fetchById(int $id): ?WorldCityModel
    {
        // Fetch a record by its id
        $stmt = $this->pdo->prepare('SELECT * FROM `worldcities` WHERE `id` = :id');
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        // Fetch queried record and stored as an Associative array in $entry
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($entry)):
            // Convert fetched record into a WorldCityModel object and return it for rendering
            return $this->arrayToModel($entry);
        else:
            return null;
        endif;
    }

    // Method that fetches all records from the database
    public function fetch(): array
    {
        $stmt = $this->pdo->prepare('SELECT *
        FROM `worldcities` 
        ORDER BY `population` DESC 
        LIMIT 10');
        $stmt->execute();

        // To store WorldCityModel objects as an array element
        $models = [];

        // Fetch all queries records and stored as an Associative array in $entries
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert array elements of $entries into a WorldCityModel object
        // Save each WorldCityModel object as an element of the array $models
        foreach ($entries as $entry):
            $models[] = $this->arrayToModel($entry);
        endforeach;

        // Return the array of WorldCityModel objects for rendering
        return $models;
    }

    // Method that fetches the total number of records from the database
    public function count(): int
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) AS `count` FROM `worldcities`');
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    }

    // Method that handles the number of records to be rendered per page
    public function paginate(int $page, int $perPage = 15): array
    {
        // Prevents a negative 'page' number manually entered in the URL
        $page = max(1, $page);

        $stmt = $this->pdo->prepare('SELECT *
        FROM `worldcities` 
        ORDER BY `population` DESC 
        LIMIT :limit OFFSET :offset');

        // PDO::PARAM_INT ensures the data type to be an integer; implicitly typed as string
        $stmt->bindValue(":limit", $perPage, PDO::PARAM_INT);
        $stmt->bindValue(":offset", ($page - 1) * $perPage, PDO::PARAM_INT);
        $stmt->execute();

        // To store WorldCityModel objects as an array element
        $models = [];

        // Fetch all queries records and stored as an Associative array in $entries
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert array elements of $entries into a WorldCityModel object
        // Save each WorldCityModel object as an element of the array $models
        foreach ($entries as $entry):
            $models[] = $this->arrayToModel($entry);
        endforeach;

        // Return the array of WorldCityModel objects for rendering
        return $models;
    }

    // Method that update a record's columns (i.e. properties) in the database
    public function update(int $id, array $properties): WorldCityModel
    {
        $stmt = $this->pdo->prepare('UPDATE `worldcities` 
            SET 
                `city` = :city, 
                `city_ascii` = :cityAscii, 
                `country` = :country, 
                `iso2` = :iso2, 
                `population` = :population 
            WHERE `id` = :id');

        $stmt->bindValue("id", $id);
        $stmt->bindValue(":city", $properties['city']);
        $stmt->bindValue(":cityAscii", $properties['cityAscii']);
        $stmt->bindValue(":country", $properties['country']);
        $stmt->bindValue("iso2", $properties['iso2']);
        $stmt->bindValue("population", $properties['population']);
        $stmt->execute();

        // Returns the updated record
        return $this->fetchById($id);
    }
}
