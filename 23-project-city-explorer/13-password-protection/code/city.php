<?php

// Require all essentials defined in the file
require __DIR__ . '/inc/all.inc.php';

// Get the value of URL parameter 'id'; otherwise assign the value of 0
$id = (int) ($_GET['id'] ?? 0);

// Instantiate an object, pass a database connection (c/o db-connect.inc.php) as an argument value
$worldCityRepository = new WorldClassRepository($pdo);

// Calls the Method that fetches a record from the database by its id
$city = $worldCityRepository->fetchById($id);

// If NO record fetched, redirect user back ot the index.php & terminate script
if (empty($city)):
    header("Location: index.php");
    die();
endif;

// Render the corresponding view page along with its content in $entries
render('city.view', ['city' => $city]);
