<?php

// Require all essentials defined in the file
require __DIR__ . '/inc/all.inc.php';

// Instantiate an object, pass a database connection (c/o db-connect.inc.php) as an argument value
$worldCityRepository = new WorldClassRepository($pdo);

// Fetch the URL Parameter 'page'; otherwise default value to (int) 1
$page = (int) ($_GET['page'] ?? 1);

// Prevents a negative 'page' number manually entered in the URL
$page = max(1, $page);

// Number of records per page
$perPage = 15;

// Fetch the total number of records in the database
$count = $worldCityRepository->count();

// Calls the Method that fetches records from the database
// $entries = $worldCityRepository->fetch();

// Fetch the records based on the number of records rendered per page
$entries = $worldCityRepository->paginate($page, $perPage);

// Render the corresponding view page along with its content in $entries
render('index.view', [
    'entries' => $entries,
    'pagination' => [
        'count' => $count,
        'perPage' => $perPage,
        'page' => $page
    ]
]);
