<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=cms;charset=utf8mb4', 'cms', 'kyvqLE0FsrIh2hVH', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    die();
}
