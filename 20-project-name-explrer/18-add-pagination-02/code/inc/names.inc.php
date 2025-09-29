<?php
// Enable strict type mode
declare(strict_types=1);

function fetch_names_by_initial(string $char, int $page = 1, int $perPage = 15): array
{
    global $pdo;

    // Ensures $page is NEVER a 0 or a negative value
    $page = max(1, $page);

    // Returns an array of names based on the selected initial
    $stmt = $pdo->prepare("SELECT DISTINCT `name` FROM `names` 
                           WHERE `name` LIKE :expr ORDER BY `name` ASC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':expr', "{$char}%");
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $perPage * ($page - 1), PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $names = [];

    foreach ($results as $result):
        $names[] = $result['name'];
    endforeach;

    return $names;
}

// Returns the number of names from the selected initial
function count_names_by_initial(string $char): int
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT COUNT(DISTINCT `name`) AS `count` FROM `names` WHERE `name` LIKE :expr");
    $stmt->bindValue(':expr', "{$char}%");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}

// Returns an array of statistics data based on the selected name
function fetch_name_entries(string $name): array
{
    global $pdo;

    // Retrieve records based on the selected name
    $stmt = $pdo->prepare("SELECT * FROM `names` WHERE `name` = :name ORDER BY `year` ASC");
    $stmt->bindValue(':name', "{$name}");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function gen_names_overview(): array
{
    global $pdo;

    // Retrieve records based on the top 10 popular names
    $stmt = $pdo->prepare("SELECT `name`, SUM(`count`) AS `sum` 
                           FROM `names` GROUP BY `name` ORDER BY `sum` DESC LIMIT 10");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
