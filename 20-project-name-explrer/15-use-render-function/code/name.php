<?php
require __DIR__ . '/inc/all.inc.php';

$name = (string) ($_GET['name'] ?? '');

if (empty($name)):
    header("Location: index.php");
    die();
endif;

$entries = fetch_name_entries($name);

render('name.view', ['name' => $name, 'entries' => $entries]);
