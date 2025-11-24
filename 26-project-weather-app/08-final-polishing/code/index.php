<?php

use App\Weather\RemoteWeatherFetcher;

require __DIR__ . "/inc/all.inc.php";

// Set default timezone
date_default_timezone_set('Asia/Manila');

// Fetch weather data from a 'fake' API
$fetcher = new RemoteWeatherFetcher();
$info = $fetcher->fetch("New York City");

// In the event of a connection error or timeout
if (empty($info)):
    echo "Weather could not be fetched.";
    die();
endif;

// Render the content into the View
require __DIR__ . "/views/index.view.php";
