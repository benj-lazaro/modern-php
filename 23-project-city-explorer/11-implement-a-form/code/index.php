<?php

require __DIR__ . '/inc/all.inc.php';

$worldCityRepository = new WorldCityRepository($pdo);

// Get 'page' number in URL
$page = (int) ($_GET['page'] ?? 1);

// Prevents a maliciously entered negative 'page' number
$page = max(1, $page);

$entriesPerPage = 15;

$count = $worldCityRepository->count();
$entries = $worldCityRepository->paginate($page, $entriesPerPage);

// Sends corresponding variables to the corresponding view 'index.view.php'
render('index.view', [
    'entries' => $entries,
    'pagination' => [
        'count' => $count,
        'perPage' => $entriesPerPage,
        'page' => $page
    ]
]);
