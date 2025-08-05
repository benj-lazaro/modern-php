<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Coonect to the local MySQL database
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Prepare the sql statement, implement a placeholder the $_GET parameter 'id' named 'id'
$preparedStatement = $pdo->prepare('SELECT * FROM `notes` WHERE `id` = :id');

// Binds the placeholder with the returned typecasted value from the $_GET parameter 'id'
$preparedStatement->bindValue('id', (int) $_GET['id']);

// Executes the prepared SQL query statement
$preparedStatement->execute();

// Fetch the selected record from the database
$result = $preparedStatement->fetch(PDO::FETCH_ASSOC);

var_dump($result);
