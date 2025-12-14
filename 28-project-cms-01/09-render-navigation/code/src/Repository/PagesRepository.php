<?php

namespace App\Repository;

// Use PDO Class provided by PHP (located at the root namespace)
use PDO;
use App\Model\PageModel;

class PagesRepository
{

    // Constructor
    public function __construct(private PDO $pdo) {}

    // Method(s)
    // Fetch records ordered by their column "id" & return an array of PageModel objects
    public function fetchForNavigation(): array {
        $stmt = $this->pdo->prepare('SELECT * FROM `pages` ORDER BY `id` ASC');
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_CLASS, PageModel::class);
        return $entries;
    }

    // Fetch & return a single record from the database
    public function fetchBySlug(string $slug): ?PageModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `pages` WHERE `slug` = :slug');
        $stmt->bindValue(":slug", $slug);
        $stmt->execute();

        // Set fetch mode then fetch a record & return it as a PageModel object (or NULL)
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
        $entry = $stmt->fetch();

        if (!empty($entry)):
            return $entry;
        else:
            return null;
        endif;
    }
}
