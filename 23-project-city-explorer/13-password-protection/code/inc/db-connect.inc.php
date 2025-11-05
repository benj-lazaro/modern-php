<?php

// Establish a database connection; save connection in the variable $pdo
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=cities;charset=utf8mb4',
        'cities',
        'zwkv-HA*L4TaHqI[',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    echo 'ERROR: A problem occured with the database connection...';
    die();
}
