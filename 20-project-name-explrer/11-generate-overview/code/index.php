<?php

require __DIR__ . '/inc/all.inc.php';

$overview = gen_names_overview();
?>

<?php require __DIR__ . '/views/header.php'; ?>

<h1>Most common names:</h1>

<ol>
    <?php foreach ($overview as $row): ?>
        <a href="name.php?<?php echo http_build_query(['name' => $row['name']]) ?>">
            <li><?php echo e($row['name']); ?></li>
        </a>

    <?php endforeach; ?>
</ol>

<?php require __DIR__ . '/views/footer.php'; ?>