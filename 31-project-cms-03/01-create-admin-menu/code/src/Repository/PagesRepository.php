<?php

namespace App\Repository;

use PDO;
use App\Model\PageModel;

// Access the database & fetch record(s) from the database table
class PagesRepository {

    // Constructor
    public function __construct(private PDO $pdo) { }

    // Method that fetches a record from the database based on its "slug" value & return it as an object
    public function fetchBySlug(string $slug): ?PageModel {
        $stmt = $this->pdo->prepare("SELECT * FROM `pages` WHERE `slug` = :slug");
        $stmt->bindValue(":slug", $slug);
        $stmt->execute();

        // Sets the fetch mode that converts a record to be fetched into an object based on the Model "PageModel"
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);

        // Fetch the record
        $entry = $stmt->fetch();

        if (!empty($entry)):
            return $entry;
        else:
            return null;
        endif;
        
    }

    // Method that fetch all records from the database, ordered by their "id" column in ascending order
    public function fetchForNavigation(): array {
        $stmt = $this->pdo->prepare("SELECT * FROM `pages` ORDER BY `id` ASC");
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);
        return $entries;
    }
}