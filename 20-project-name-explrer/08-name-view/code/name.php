<?php
require __DIR__ . '/inc/all.inc.php';

$name = (string) ($_GET['name'] ?? '');

$nameData = fetch_name($name);

?>

<?php require __DIR__ . '/views/header.php'; ?>

<?php display_name($nameData); ?>

<?php require __DIR__ . '/views/footer.php'; ?>