<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Connect to a local MySQL database named 'note_app'
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Test data
$title = 'A title from PHP';
$content = 'The content from PHP';

// Prepare statement for data insertion
$statement = $pdo->prepare('INSERT INTO `notes` (`title`, `content`) VALUES (:title, :content)');

// Bind the placeholders to their corresponding values
$statement->bindValue('title', $title);
$statement->bindValue('content', $content);

// Execute data insertion
$statement->execute();
