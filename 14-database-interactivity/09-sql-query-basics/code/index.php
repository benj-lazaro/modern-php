<?php

// Sanities user input/output
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

// Coonect to the local MySQL database
$pdo = new PDO("mysql:host=127.0.0.1; dbname=note_app", 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

// Select record from the columns 'id' & 'title' of the table 'notes
// Sort records by their 'title' in ascending order
$queryStatement = $pdo->prepare("SELECT `id`, `title` FROM `notes` ORDER BY `title` ASC");

// Execute the prepared SQL statement
$queryStatement->execute();

// Fetch the queried records as an Assciative array
$results = $queryStatement->fetchAll(PDO::FETCH_ASSOC);

?>

<ul>
    <?php foreach ($results as $result): ?>
        <li><?php echo e($result['title']); ?></li>
    <?php endforeach; ?>
</ul>