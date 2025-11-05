<?php

// Require all essentials defined in the file
require __DIR__ . '/inc/all.inc.php';

// Get the value of URL parameter 'id' submitted from "edit.view.php"
$id = (int) ($_GET['id'] ?? 0);

// Instantiate an object, pass a database connection (c/o db-connect.inc.php) as an argument value
$worldCityRepository = new WorldClassRepository($pdo);

// Fetches a record from the database by its id
$model = $worldCityRepository->fetchById($id);

// If NO record fetched, redirect back to "index.php"
if (empty($model)):
    header("Location: index.php");
    die();
endif;

// Process POST data submitted from "edit.view.php"
if (!empty($_POST)):
    // Extract individual fields from the $_POST array, placed into local variables
    $city = (string) ($_POST['city'] ?? '');
    $cityAscii = (string) ($_POST['cityAscii'] ?? '');
    $country = (string) ($_POST['country'] ?? '');
    $iso2 = (string) ($_POST['iso2'] ?? '');
    $population = (int) ($_POST['population'] ?? 0);

    // Check if any of the variables is empty
    if (empty($city) || empty($cityAscii) || empty($country) || empty($iso2) || empty($population)):
        // Perform NO record update & redirect back to "index.php"
        header("Location: index.php");
        die();
    endif;

    // Update the record in the database & save updated content in $model
    $model = $worldCityRepository->update($id, [
        'city' => $city,
        'cityAscii' => $cityAscii,
        'country' => $country,
        'iso2' => $iso2,
        'population' => $population
    ]);

    header("Location: index.php");
    die();
endif;

// Render the corresponding view page along with its updated content
render('edit.view', ['city' => $model]);
