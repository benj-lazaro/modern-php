<?php

namespace App\Repository;

// Use PDO Class provided by PHP (located at the root namespace)

use App\Model\PageModel;
use PDO;

class PageRepository
{

    // Constructor
    public function __construct(private PDO $pdo) {}

    // Fetch & return a single record from the database
    public function fetchBySlug(string $slug): ?PageModel
    {
        $stmt = $this->pdo->prepare('SELECT * FROM `pages` WHERE `slug` = :slug');
        $stmt->bindValue(":slug", $slug);
        $stmt->execute();

        // Set fetch mode then fetch a record & return it as a PageModel object (or NULL)
        $stmt->setFetchMode(PDO::FETCH_CLASS, PageModel::class);
        $entry = $stmt->fetch();

        return $entry;
    }
}
