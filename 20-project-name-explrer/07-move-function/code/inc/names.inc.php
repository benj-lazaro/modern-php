<?php

declare(strict_types=1);

function fetch_names_by_initial(string $char): array
{
    global $pdo;

    // Access the database
    $stmt = $pdo->prepare("SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC");
    $stmt->bindValue(':expr', "{$char}%");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process database records & return as an array
    $names = [];

    foreach ($results as $result):
        $names[] = $result['name'];
    endforeach;

    return $names;
}
