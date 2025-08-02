<?php

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Coonect to the local MySQL database
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Prepare the SQL query to be sent to the database server
$queryStatement = $pdo->prepare("SELECT * FROM `notes`");

// Execute the prepared statement
$queryStatement->execute();

// Fetch the result (array) with element accessible by a string key
$results = $queryStatement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($results);

?>

<ul>
    <?php foreach ($results as $result): ?>
        <li><?php echo e($result['title']); ?></li>
    <?php endforeach; ?>
</ul>