<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of URL parameter 'char'
$char = (string) ($_GET['char'] ?? '');

// Get the 1st character is the value happens to be a string
if (strlen($char) > 1):
    $char = $char[0];
endif;

// Convert the character to uppercase
$char = strtoupper($char);

$alphabet = gen_alphabet();

// Check the character's length & if it is an alphabet letter
if (strlen($char) === 0 or !in_array($char, $alphabet)):
    header("Location: index.php");
    die();
endif;

// Identify the current 'page' rendered
$page = (int) ($_GET['page'] ?? 1);

// Explicitly define the number of entries per page
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
