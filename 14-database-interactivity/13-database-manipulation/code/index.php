<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Connect to a local MySQL database named 'note_app'
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Prepare statement for updating the value(s) of an existing record
$statement = $pdo->prepare('UPDATE `notes` SET `title` = :title, `content` = :content WHERE `id` = :id');

// Bind the placeholders to their corresponding updated (test) values
$statement->bindValue('id', 11);
$statement->bindValue('title', 'New title from PHP');
$statement->bindValue('content', 'New content from PHP');

// Execute data insertion to the targeted existing record
$statement->execute();

// Prepare a new statement for the deletion of an existing record
$statement = $pdo->prepare('DELETE FROM `notes` WHERE `id`= :id');

// Bind the placeholder to the corresponding value
$statement->bindValue('id', 11);

// Execute the deletion of the targeted record
$statement->execute();

// Prepare another statement for the deletion of records containing a specific string
$statement = $pdo->prepare('DELETE FROM `notes` WHERE `title` = :title');

// Test data
$targetString = 'A title...';

// Bind the placedholder to the corresponding value
$statement->bindValue('title', $targetString);

// Execute deletion of select records
$statement->execute();
