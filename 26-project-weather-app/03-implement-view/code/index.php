<?php

use App\Weather\FakeWeatherFetcher;

require __DIR__ . "/inc/all.inc.php";

// Fetch weather data from a 'fake' API
$fetcher = new FakeWeatherFetcher();

// Stores data into $info
$info = $fetcher->fetch("New York City");

require __DIR__ . "/views/index.view.php";
