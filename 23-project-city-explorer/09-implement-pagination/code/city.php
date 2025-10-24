<?php

require __DIR__ . '/inc/all.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$worldCityRepository = new WorldCityRepository($pdo);
$city = $worldCityRepository->fetchById($id);

// If the $_GET URL parameter is empty, redirect user back to the landing page
if (empty($city)):
    header("Location: index.php");
    die();
endif;

render('city.view', ['city' => $city]);
