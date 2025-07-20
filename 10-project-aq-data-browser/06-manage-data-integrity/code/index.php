<?php
require __DIR__ . '/inc/functions.inc.php';

// Read, decode & convert contents of the JSON file as an array
$cities = json_decode(
    file_get_contents(__DIR__ . "/../../data/index.json"),
    true
);

?>

<!-- Web app's header & main body HTML -->
<?php require __DIR__ . '/views/header.inc.php'; ?>

<!-- Rendere cities as individuals list items -->
<ul>
    <?php foreach ($cities as $city): ?>
        <li>
            <a href="city.php?<?php echo http_build_query(['city' => $city['city']]); ?>">
                <?php echo e($city['city']) . ", " . e($city['country']) . " (" . ($city['flag']) . ")"; ?>
            </a>
        </li>

    <?php endforeach; ?>
</ul>

<!-- Web app's footer -->
<?php require __DIR__ . '/views/footer.inc.php'; ?>