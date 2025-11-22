<?php

use App\Weather\RemoteWeatherFetcher;

require __DIR__ . "/inc/all.inc.php";

// Fetch weather data from a 'fake' API
$fetcher = new RemoteWeatherFetcher();
$info = $fetcher->fetch("New York City");

// Render the content into the View
require __DIR__ . "/views/index.view.php";
