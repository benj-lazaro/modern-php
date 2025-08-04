<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Coonect to the local MySQL database
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Fetch 1 record from the database
$queryStatement = $pdo->prepare("SELECT * FROM `notes` WHERE `id` = 5");

// Fetch a specific records from the database, sorted by the 'title' column in ascending order
// $queryStatement = $pdo->prepare("SELECT * FROM `notes` WHERE `id` = 5 OR `id` = 6 ORDER BY `id` ASC");

// Execute the prepared SQL query statement
$queryStatement->execute();
$result = $queryStatement->fetch(PDO::FETCH_ASSOC);
var_dump($result);

// Fetch elements from the returned result (array)
// while (($results = $queryStatement->fetch(PDO::FETCH_ASSOC)) !== false):
//     var_dump($results);
//     echo "<br /> <br /> ";
// endwhile;
