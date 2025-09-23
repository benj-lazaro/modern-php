<?php

declare(strict_types=1);

function fetch_names_by_initial(string $char): array
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC");
    $stmt->bindValue(':expr', "{$char}%");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $names = [];

    foreach ($results as $result):
        $names[] = $result['name'];
    endforeach;

    return $names;
}

function fetch_name(string $name): array
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM `names` WHERE `name` = :expr ORDER BY `year` ASC");
    $stmt->bindValue(':expr', "{$name}");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $nameData = [];

    foreach ($results as $result):
        $nameData[] = ["name" => $result['name'], "year" => $result['year'], "count" => $result['count']];
    endforeach;

    return $nameData;
}

function display_name(array $nameData): void
{
    if (!empty($nameData)):
        echo "<table>";
        echo "<thead><tr><th>Name</th><th>Year</th><th>Count</th></tr></thead>";
        echo "<tbody>";
        echo "</tbody>";

        foreach ($nameData as $name):
            echo "<tr>";
            echo "<td>";
            echo $name['name'];
            echo "</td>";
            echo "<td>";
            echo $name['year'];
            echo "</td>";
            echo "<td>";
            echo $name['count'];
            echo "</td>";
            echo "</tr>";
        endforeach;
        echo "</table>";
    endif;
}
