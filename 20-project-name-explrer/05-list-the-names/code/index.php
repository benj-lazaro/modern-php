<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of URL parameter 'char'
$char = (string) ($_GET['char'] ?? '');

// Input validation in the event of URL manipulation
if (strlen($char) > 1):
    $char = $char[0];
endif;

$char = strtoupper($char);

// Prepare SQL statement
$stmt = $pdo->prepare("SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC");
$stmt->bindValue(':expr', "{$char}%");

// Execute SQL statement
$stmt->execute();

// Fetch all queried records
$names = [];
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Iterate & extract the values from the key 'name'
foreach ($results as $result):
    $names[] = $result['name'];
endforeach;
?>

<?php require __DIR__ . '/views/header.php'; ?>

<ul>
    <?php foreach ($names as $name): ?>
        <li><a href="name.php?<?php echo http_build_query(['name' => $name]); ?>"><?php echo e($name); ?></a></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.php'; ?>