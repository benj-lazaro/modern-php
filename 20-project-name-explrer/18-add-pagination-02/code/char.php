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

// Identifies the current 'page' rendered
$page = (int) ($_GET['page'] ?? 1);

// Explicitly defines the number of entries per page
$perPage = 15;

// Fetch names by selected initial
$names = fetch_names_by_initial($char, $page, $perPage);

// Fetch the number of names based on the selected initial
$count = count_names_by_initial($char);

// Render the corresponding view file
render('char.view', [
    'names' => $names,
    'char' => $char,
    'pagination' => ['page' => $page, 'count' => $count, 'perPage' => $perPage]
]);
