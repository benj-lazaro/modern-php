<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cities;charset=utf8mb4', 'cities', '[axwAEsmj@iWSX!e', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    die();
}
