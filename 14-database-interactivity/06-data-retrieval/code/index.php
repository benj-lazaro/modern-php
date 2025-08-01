<?php

// Coonect to the local MySQL database
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Prepare the SQL query to be sent to the database server
$queryStatement = $pdo->prepare("SELECT * FROM `notes`");

// Execute the prepared statement
$queryStatement->execute();

// Fetch the result (array) returned by the executed statement
$result = $queryStatement->fetchAll();

var_dump($result);
