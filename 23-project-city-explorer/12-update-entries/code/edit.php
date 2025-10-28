<?php

require __DIR__ . '/inc/all.inc.php';

// Fetch the value of the URL parameter 'id' 
$id = (int) ($_GET['id'] ?? 0);

// Access the database & fetch the corresponding record by its 'id' 
$worldCityRepository = new WorldCityRepository($pdo);
$model = $worldCityRepository->fetchById($id);

// If the $_GET URL parameter is empty, redirect user back to the landing page
if (empty($model)):
    header("Location: index.php");
    die();
endif;

// Extract elements of $_POST Associative array into their corresponding variables
if (!empty($_POST)):
    $city = (string) ($_POST['city'] ?? '');
    $cityAscii = (string) ($_POST['cityAscii'] ?? '');
    $country = (string) ($_POST['country'] ?? '');
    $iso2 = (string) ($_POST['iso2'] ?? '');
    $population = (int) ($_POST['population'] ?? 0);

    // If any of the variable is empty, ridirect back to the main page (index.php)
    if (empty($city) || empty($cityAscii) || empty($country) || empty($iso2) || empty($population)):
        header("location: index.php");
        die();
    endif;

    // Update record in the database & store the updated content in a variable for rendering
    $model = $worldCityRepository->update($id, [
        'city' => $city,
        'cityAscii' => $cityAscii,
        'country' => $country,
        'iso2' => $iso2,
        'population' => $population
    ]);

    // Redirect back tp the main (index.php) after update
    header("location: index.php");
    die();

endif;

// View the submitted updated columns of the corresponding record
// var_dump($_POST);

// Render the updated record content in the view page '/views/pages/edit.view.php'
render('edit.view', ['city' => $model]);
