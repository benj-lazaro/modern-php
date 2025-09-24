<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch value of URL parameter 'char'
$char = (string) ($_GET['char'] ?? '');

// Parameter validation prior to function call
if (strlen($char) > 1):
    $char = $char[0];
endif;

if (strlen($char) === 0):
    header("Location: index.php");
    die();
endif;

$char = strtoupper($char);

// Fetch names stored in an array
$names = fetch_names_by_initial($char);

?>

<?php require __DIR__ . '/views/header.php'; ?>

<ul>
    <?php foreach ($names as $name): ?>
        <li><a href="name.php?<?php echo http_build_query(['name' => $name]); ?>"><?php echo e($name); ?></a></li>
    <?php endforeach; ?>
</ul>

<?php require __DIR__ . '/views/footer.php'; ?>