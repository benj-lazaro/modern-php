<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

try {
    // Attempt to connect to the local database server
    $pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '1234', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $err) {
    // var_dump($err->getMessage());
    echo "A problem occured on the database connection...";

    // Immediately terminate this program if it fails to connect
    die();
}
