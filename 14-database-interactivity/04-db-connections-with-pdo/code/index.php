<?php

// The instantiated object represents the database connection to a MySQL / MariaDB database
// Access 'note_app' database w/ given credentials; flag a fatal error if it fails
$pdo = new PDO("mysql:host=localhost; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

var_dump($pdo);
