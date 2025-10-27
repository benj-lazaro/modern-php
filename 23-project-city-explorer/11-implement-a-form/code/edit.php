<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of the URL parameter 'id' 
$id = (int) ($_GET['id'] ?? 0);

// Access the database & fetch the corresponding record by its 'id' 
$worldCityRepository = new WorldCityRepository($pdo);
$city = $worldCityRepository->fetchById($id);

// If the $_GET URL parameter is empty, redirect user back to the landing page
if (empty($city)):
    header("Location: index.php");
    die();
endif;

// Render the corresponding view file along with the correpoding record
render('edit.view', ['city' => $city]);
