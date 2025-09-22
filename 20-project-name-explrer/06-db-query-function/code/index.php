<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of URL parameter 'char'
$char = (string) ($_GET['char'] ?? '');

// Input validation in the event of URL manipulation
if (strlen($char) > 1):
    $char = $char[0];
endif;

$char = strtoupper($char);

function fetch_names_by_initial($char)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC");
    $stmt->bindValue(':expr', "{$char}%");
    $stmt->execute();

    $names = [];

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result):
        $names[] = $result['name'];
    endforeach;

    return $names;
}

$names = fetch_names_by_initial($char);
?>

<?php require __DIR__ . '/views/header.php'; ?>

<ul>
    <?php foreach ($names as $name): ?>
        <li><a href="name.php?<?php echo http_build_query(['name' => $name]); ?>"><?php echo e($name); ?></a></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.php'; ?>